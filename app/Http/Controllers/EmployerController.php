<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Requests\EmployerRequest;
use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{

    // Fonction pour afficher la liste des employés
    public function index()
    {
        // Titre de la page
        $title = 'Employers';
        $empint = 0;
        $empper = 0;

        // Récupérer les employés depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        $employes = Employer::paginate(10);


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

        // dd($request);

        // Création de l'employé
        Employer::create([
            'name' => $request->name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'status' => $request->status,
        ]);

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('employer.index')->with('success', 'Employer successfully created.');
    }

    // Fonction pour afficher un employer
    public function show(Employer $employer)
    {
        // Titre de la page
        $title = 'Show Employer';

        return view('employers.show', compact('title', 'employer'));
    }


    // Fonction pour afficher le formulaire de modification d'un employé
    public function edit(Employer $employer)
    {
        // Titre de la page
        $title = 'Edit Employer';

        return view('employers.edit', compact('title', 'employer'));
    }

    // Fonction pour mettre a jour un employer
    public function update(Employer $employer, EmployerRequest $request)
    {
        //Mise a jour de employer
        $employer->name = $request->name;
        $employer->first_name = $request->first_name;
        $employer->email = $request->email;
        $employer->contact = $request->contact;
        $employer->status = $request->status;

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
        return redirect()->back()->with('success', 'the department has been successfully deleted.');
    }
}
