<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginEmployeController extends Controller
{
    //pour afficher la page de connexion pour employe
    public function loginEmp()
    {

        return view('pointages.login');
    }

    //Pour afficher le formulaire d'initialisation si c'est leur premiere fois
    public function initEmp()
    {

        return view('pointages.initialize');
    }


    //Pour le traitement de la connexion
    //pour les employes
    public function handlelogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4'],
        ]);

        $employe = Employer::where('email', $request->email)->first();

        // Check if employe exists and password is correct
        if (!$employe || !Hash::check($request->password, $employe->password)) {
            // dd($employe);
            return redirect()->back()->with('error', 'The provided credentials do not match our records.');
        }

        // Stocker l'ID de l'employé dans la session de façon persistante
        session(['employe' => $employe]);

        return redirect()->route('verify.employe')->with('success', 'Welcome back, ' . $employe->name . '!',);
    }

    //Pour sauvegarder le mot de passe lors de la premiere connexion
    //pour les employes
    public function handleInitEmp(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4'],
            'password_confirm' => ['required', 'same:password'],
        ]);

        $employe = Employer::where('email', $request->email)->first();

        // verifier si l'employe existe
        if (!$employe) {
            return redirect()->back()->with('error', 'No employee found with this email.');
        }

        // verifier si le mot de passe est deja initialisé
        if ($employe->password) {
            return redirect()->back()->with('error', 'Your password is already set. Please login instead.');
        }

        //Sauvegarder le mot de passe
        $employe->password = Hash::make($request->password);
        $employe->save();

        return redirect()->route('login.employe')->with('success', 'Your password has been set successfully. You can now login.');
    }

    //Pour afficher la page de verification de l'employe
    public function verifyEmp()
    {

        // dd(session('employe'));

        return view('pointages.verify-employe');
    }

    //Pour le traitement de la verification de l'employe
    public function handleVerifyEmp(Request $request)
    {

        dd($request);
        // $profile = session('employe')->profile;
        // $capturedImage = $request->input('face_image');
        // $referenceImage = session('employe')->profile; // supposons que c'est une URL ou base64

        // // Appeler l’API de reconnaissance faciale (ex: Azure Face API)
        // $result = FaceRecognitionService::compare($capturedImage, $referenceImage);

        // if ($result['matched']) {
        //     return redirect()->route('pointage');
        //     return true;
        // } else {
        //     // return back()->with('error', 'Accès refusé : visage non reconnu');
        //     return False;
        // }
    }
}
