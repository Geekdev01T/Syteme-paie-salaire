<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\EmployerRequest;
use App\Models\Classe;
use App\Models\Cours;
use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{

    //Fonction pour vérifier si un paramètre requis est présent
    protected function checkRequiredParam($param, $message = 'A required parameter is missing.')
    {
        if (empty($param)) {
            return redirect()->back()->with('error', $message);
        }
        return null;
    }

    // Fonction pour afficher la liste des employés
    public function index()
    {
        // Titre de la page
        $title = 'List Employer';
        $empint = 0;
        $empper = 0;

        // Récupérer les employés depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        $employes = Employer::orderBy('id', 'desc')->paginate(20);


        return view('employers.index', compact('title', 'employes', 'empint', 'empper'));
    }

    // Fonction pour afficher le formulaire de création d'un employé
    public function create()
    {
        // Titre de la page
        $title = 'Create Employer';

        // Récupérer les départements pour le formulaire de création
        // Utilisation de la méthode all() pour récupérer tous les départements
        // Pour trier les départements par nom en ordre croissant
        $departments = Departement::all()->sortBy('name');

        return view('employers.create', compact('title', 'departments'));
    }

    // Fonction pour stocker un nouvel employé
    public function store(EmployerRequest $request)
    {


        $profile = null;
        //Si le champ logo est vide, le mettre à null
        if (empty($request->file('profile'))) {
            $profile = null;
        }
        //Sinon, stocker le logo
        else {
            // $path = $request->file('logo')->store('logos', 'public');
            // $enterprise->logo = $path;
            $file = $request->file('profile');
            $filename = 'profile_' . date('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profiles', $filename, 'public');
            $profile = $path;
        }

        // Création de l'employé
        Employer::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'status' => $request->status,
            'honorary' => $request->honorary,
            'fixed_salary' => $request->fixed_salary,
            'profile' => $profile,
        ]);

        // dd($profile);

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('employer.index')->with('success', 'Employer successfully created.');
    }

    // Fonction pour stocker un département pour un employé
    public function storedep(Employer $employer, Request $request)
    {
        // Validation des données
        // $request->validate([
        //     'employer_id' => 'required|exists:employers,id|unique:departement_employer,employer_id',
        //     'departement_id' => 'required|exists:departements,id|unique:departement_employer,departement_id',
        // ]);

        // Récupérer l'employé et le département
        // $employer = Employer::findOrFail($request->employer_id);
        $department = Departement::findOrFail($request->departement_id);

        // Vérifie si la relation existe déjà
        if ($employer->departements()->where('departement_id', $request->departement_id)->exists()) {
            return redirect()->back()->with('error', 'This employee is already linked to this department.');
        }

        // Attacher le département à l'employé
        // $employer->departements()->attach($department);
        $employer->departements()->syncWithoutDetaching([$department->id]);

        // Rediriger vers la liste avec un message de succès
        return redirect()->back()->with('success', 'Department successfully added to employer.');
    }

    // Fonction pour detacher un departement a un employer
    public function deletedep(Employer $employer, Request $request)
    {
        if ($redirect = $this->checkRequiredParam($employer)) {
            return $redirect;
        }

        // $request->departement_id doit contenir l'ID du département à détacher
        $employer->departements()->detach($request->departement_id);

        return redirect()->back()->with('success', 'Department successfully detached employee.');
    }

    // Fonction pour stocker un cours pour un employé
    public function storecourse(Employer $employer, Request $request)
    {
        // Validation des données
        // $request->validate([
        //     'employer_id' => 'required|exists:employers,id|unique:cours_employers,employer_id',
        //     'cours_id' => 'required|exists:cours,id|unique:cours_employers,cours_id',
        // ]);

        if (empty($request->cours_id)) {
            return redirect()->back()->with('error', 'Please select a course to add. Or add department to this employee first.');
        }


        // Récupérer le cours
        $course = Cours::findOrFail($request->cours_id);

        // Vérifie si la relation existe déjà
        if ($employer->cours()->where('cours_id', $request->cours_id)->exists()) {
            return redirect()->back()->with('error', 'This employee is already linked to this course.');
        }

        // Attache le cours à l'employé (évite les doublons)
        $employer->cours()->syncWithoutDetaching([$course->id]);

        // Rediriger vers la liste avec un message de succès
        return redirect()->back()->with('success', 'Course successfully added to employer.');
    }

    // Fonction pour detacher un cours a un employer
    public function deletecourse(Employer $employer, Request $request)
    {

        // $request->cours_id doit contenir l'ID du cours à détacher
        $employer->cours()->detach($request->cours_id);

        return redirect()->back()->with('success', 'Course successfully detached employee.');
    }

    // Fonction pour stocker un cours pour un employé
    public function storeclass(Employer $employer, Request $request)
    {
        // Validation des données
        // $request->validate([
        //     'employer_id' => 'required|exists:employers,id|unique:cours_employers,employer_id',
        //     'classe_id' => 'required|exists:cours,id|unique:cours_employers,cours_id',
        // ]);

        // Récupérer le cours
        $class = Classe::findOrFail($request->classe_id);

        // Vérifie si la relation existe déjà
        if ($employer->classes()->where('classe_id', $request->classe_id)->exists()) {
            return redirect()->back()->with('error', 'This employee is already linked to this class.');
        }

        // Attache la classe à l'employé (évite les doublons)
        $employer->classes()->syncWithoutDetaching([$class->id]);

        // Rediriger vers la liste avec un message de succès
        return redirect()->back()->with('success', 'Class successfully added to employer.');
    }

    // Fonction pour detacher une classe a un employer
    public function deleteclass(Employer $employer, Request $request)
    {
        // $request->classe_id doit contenir l'ID de la classe à détacher
        $employer->classes()->detach($request->classe_id);

        return redirect()->back()->with('success', 'Class successfully detached employee.');
    }


    // Fonction pour afficher un employer
    public function show(Employer $employer)
    {
        // Titre de la page
        $title = 'Show Employer';

        // Récupérer les départements depuis la base de données
        $departments = Departement::all()->sortBy('name');
        // Récupère tous les départements liés à cet employé
        $departements_lies = $employer->departements;
        //nombre de departements lies
        $count_department = $employer->departements()->count();


        // Récupérer les cours appartenant aux départements de l'employé
        $departementIds = $employer->departements()->pluck('departements.id');
        $courses = Cours::whereIn('departement_id', $departementIds)->get()->sortBy('name');
        //Recuperation des cours de l'employer
        $courses_lies = $employer->cours;
        //nombre de cours lies
        $count_course = $employer->cours()->count();


        //Recuperer tous les classes dans la BD
        $classes = Classe::all()->sortBy('name');
        //Recuperer les classes lies a cet employer
        $classes_lies = $employer->classes;
        //nombre de classes lies
        $count_class = $employer->classes()->count();

        return view('employers.show', compact('title', 'employer', 'departments', 'count_department', 'departements_lies', 'courses', 'count_course', 'courses_lies', 'classes', 'count_class', 'classes_lies'));
    }


    // Fonction pour afficher le formulaire de modification d'un employé
    public function edit(Employer $employer)
    {
        // Titre de la page
        $title = 'Edit Employer';

        return view('employers.edit', compact('title', 'employer'));
    }

    // Fonction pour mettre a jour un employer
    public function update(Employer $employer, Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|min:4',
            'first_name' => 'required|string|min:2',
            'email' => 'required|email',
            'contact' => 'required|string|min:9',
            'status' => 'required',
            'honorary' => 'nullable|integer|min:500',
            'fixed_salary' => 'nullable|integer|min:10000',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000', // 5MB max
        ]);

        //Mise a jour de employer
        $employer->name = $request->name;
        $employer->first_name = $request->first_name;
        $employer->email = $request->email;
        $employer->contact = $request->contact;
        $employer->status = $request->status;
        $employer->honorary = $request->honorary;
        $employer->fixed_salary = $request->fixed_salary;

        //Traitement du fichier de profil
        $profile = null;
        //Si le champ logo est vide, le mettre à null
        if (empty($request->file('profile'))) {
            $profile = null;
        }
        //Sinon, stocker le logo
        else {
            // $path = $request->file('logo')->store('logos', 'public');
            // $enterprise->logo = $path;
            $file = $request->file('profile');
            $filename = 'profile_' . date('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profiles', $filename, 'public');
            $profile = $path;
        }

        // Si un nouveau profil est fourni, le mettre à jour
        if ($profile) {
            $employer->profile = $profile;
        }

        // Enregistrer les modifications
        $employer->save();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('employer.index')->with('success', 'Employer successfully updated.');
    }

    // Fonction pour supprimer un employé
    public function delete(Employer $employer)
    {
        // Supprimer l'employé
        $employer->delete();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('employer.index')->with('success', 'the employe has been successfully deleted.');
    }
}
