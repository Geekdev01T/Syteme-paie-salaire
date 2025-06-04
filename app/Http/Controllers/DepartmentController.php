<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    // Fonction pour afficher la liste des départements
    public function index()
    {
        // Titre de la page
        $title = 'Departments';
        $depfr = 0;
        $depen = 0;
        $countfr = 0;
        $counten = 0;

        // Récupérer les départements depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        // Remarque : la méthode orderBy doit être appelée avant paginate
        $departments = Departement::orderBy('id', 'asc')->paginate(10);

        return view('departments.index', compact('title', 'departments', 'depfr', 'depen', 'countfr', 'counten'));
    }

    // Fonction pour afficher le formulaire de création d'un département
    public function create()
    {
        // Titre de la page
        $title = 'Create Department';

        return view('departments.create', compact('title'));
    }

    // Fonction pour stocker un nouveau département
    public function store(Departement $departement,DepartmentRequest $request)
    {

        // Création du département
        // dd($request);

        Departement::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'section' => $request->section,
        ]);

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('department.index')->with('success', 'Department successfully created.');
    }

    // Fonction pour afficher un departement
    public function show(Departement $department)
    {
        // Titre de la page
        $title = 'Show Department';

        //Recuperer les employers appartenant a ce departement
        // $employers = Employer::all()->where('departement_id', $department->id)->sortBy('name');
        $employes = $department->employes()->orderBy('name', 'asc')->get();
        $count = $department->employes()->count();


        return view('departments.show', compact('title', 'department', 'count', 'employes'));
    }

    // Fonction pour afficher le formulaire de modification d'un département
    public function edit(Departement $department)
    {
        // Titre de la page
        $title = 'Edit Department';

        return view('departments.edit', compact('title', 'department'));
    }

    // Fonction pour mettre a   jour un département
    public function update(Departement $department, DepartmentRequest $request)
    {
        //Mise a jour du departement
        $department->name = $request->name;
        $department->code = $request->code;
        $department->description = $request->description;
        $department->section = $request->section;

        $department->save();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('department.index')->with('success', 'Department successfully updated.');
    }

    // Fonction pour supprimer un département
    public function delete(Departement $department)
    {
        // Supprimer le département
        $department->delete();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('department.index')->with('success', 'the department has been successfully deleted.');
    }
}
