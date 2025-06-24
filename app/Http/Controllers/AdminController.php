<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\ResetCodePassword;
use App\Models\User;
use App\Notifications\SendEmailToAdminAfterRegistrationNotification;
use Carbon\Carbon as CarbonCarbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    //Fonction pour afficher la liste des admins
    public function index(){
        //Titre de la page
        $title = 'List Admin';

        $veriAdm = 0;
        $NoVeriAdm = 0;

        //Recuperer les admins de la BD
        $admins = User::orderBy('id','desc')->paginate(10);

        //Retourner la vue
        return view('admins.index', compact('title', 'admins', 'veriAdm', 'NoVeriAdm'));
    }

    //Fonction pour afficher l'interface de création des admins
    public function create()
    {
        //Titre de la page
        $title = 'Create Admin';

        //Retourner la vue
        return view('admins.create', compact('title'));
    }

    //Fonction pour enregistrer les admins dans la BD
    public function store(AdminRequest $request){
        // dd($request);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make('01234'),
        ]);

        //Envoyer un mail pour que l'utilisateur puisse confirmer son compte
        //Envoyer un code par email pour verification
        if ($user) {

            try {

                ResetCodePassword::where('email', $user->email)->delete();
                $code = rand(1000, 4000);

                $data = [
                    "code" => $code,
                    "email" => $user->email,
                ];

                ResetCodePassword::create($data);
                Notification::route('mail', $user->email)->notify(new SendEmailToAdminAfterRegistrationNotification($code, $user->email));

                return redirect()->route('admin.index')->with('success', 'Admin created successfully. Please check your email to validate your account.');

            } catch (Exception $e) {

                dd($e);
                // throw new Exception("Une erreur est survenue lors de l'envoi du mail");
            }

        }

    }

    //Fonction pour validation du compte admin
    public function defineAccess($email)
    {

        //Verifier si l'email existe dans la BD
        $user = User::where('email', $email)->first();
        // dd($user);

        if ($user) {
            //Rediriger vers la page de validation du compte
            return view('auth.validate-account', compact('email'));
        } else {
            // return redirect()->route('login')->with('error', 'Email not found.');
            //Rediriger vers une route 404
            return abort(404, 'Email not found.');
        }

    }

    //Fonction pour soumettre la validation du compte admin
    public function submitDefineAccess(Request $request)
    {
        //Valider la requete
        $request->validate([
            'code' => 'required|integer|min:1000|max:4000',
        ]);

        // dd($request);

        //Verifier si l'email existe dans la BD
        $user = User::where('email', $request->email)->first();

        if ($user) {
            //Verifier si le code existe dans la BD
            $resetCode = ResetCodePassword::where('email', $request->email)->where('code', $request->code)->first();
            // dd($resetCode);
            if ($resetCode) {
                //Mettre à jour le statut de l'utilisateur
                $date = date('Y-m-d H:i:s');
                $user->email_verified_at = $date;
                $user->save();

                return redirect()->route('reset-password', $request->email)->with('success', 'Account validated successfully. You can now reset your password.');
            } else {
                return redirect()->back()->with('error', 'Invalid code. Please try again.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email not found.');
        }
    }

    //Fonction pour afficher l'interface de réinitialisation du mot de passe
    public function resetPassword($email)
    {
        //Verifier si l'email existe dans la BD
        $user = User::where('email', $email)->first();


        if ($user) {
            //Titre de la page
            $title = 'Reset Password';

            //Retourner la vue
            return view('auth.reset-password', compact('title', 'email'));
        } else {
            // return redirect()->route('login')->with('error', 'Email not found.');
            //Rediriger vers une route 404
            return abort(404, 'Email not found.');
        }
    }

    //Fonction pour soumettre la réinitialisation du mot de passe
    public function submitresetPassword(Request $request)
    {
        //Valider la requete
        $request->validate([
            'password' => 'required|string|min:4',
            'password_confirm' => 'required|same:password',
        ]);

        //Verifier si l'email existe dans la BD
        $user = User::where('email', $request->email)->first();

        if ($user) {
            //Mettre à jour le mot de passe de l'utilisateur
            $user->update(['password' => Hash::make($request->password)]);
            return redirect()->route('login')->with('success', 'Password reset successfully. You can now login with your new password.');
        } else {
            return redirect()->route('login')->with('error', 'Email not found.');
        }
    }

    // Fonction pour supprimer un admin
    public function delete(User $user)
    {
        // Supprimer l'admin
        $user->delete();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('admin.index')->with('success', 'the admin has been successfully deleted.');
    }
}
