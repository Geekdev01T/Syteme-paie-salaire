<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Cours;
use App\Models\Departement;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Fonction pour afficher la liste des cours
    public function index()
    {
        // Titre de la page
        $title = 'Courses';
        $coursefr = 0;
        $courseen = 0;

        // Récupérer les cours depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        // Remarque : la méthode orderBy doit être appelée avant paginate
        $courses = Cours::orderBy('id', 'asc')->paginate(20);

        return view('courses.index', compact('title', 'courses', 'coursefr', 'courseen'));
    }

    // Fonction pour afficher le formulaire de création d'un cours
    public function create()
    {
        // Titre de la page
        $title = 'Create Course';

        // Remarque : la méthode orderBy doit être appelée avant paginate
        $departments = Departement::all()->sortBy('name');


        return view('courses.create', compact('title', 'departments'));
    }

    // Fonction pour stocker un nouveau cours
    public function store(Cours $course, CourseRequest $request)
    {

        // Création du cours
        // dd($request);

        $department = Departement::all()->where('id', $request->departement_id)->first();

        Cours::create([
            'name' => $request->name,
            'code' => $request->code,
            'section' => $department->section,
            'departement_id' => $request->departement_id,
        ]);

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('course.index')->with('success', 'Course successfully created.');
    }

    // Fonction pour afficher un cours
    public function show(Cours $course)
    {
        // Titre de la page
        $title = 'Show Course';

        //Recuperer le departement auquel appartenant a ce cours
        $department = $course->departement()->get()->first();

        //Recuperer les employers qui enseignent ce cours
        $employes = $course->employers()->get();

        return view('courses.show', compact('title', 'course', 'department', 'employes'));
    }

    // Fonction pour afficher le formulaire de modification d'un cours
    public function edit(Cours $course)
    {
        // Titre de la page
        $title = 'Edit Course';

        // Pour recuperer tous les departements
        $departments = Departement::all()->sortBy('name');

        return view('courses.edit', compact('title', 'course', 'departments'));
    }

    // Fonction pour mettre a jour un cours
    public function update(Cours $course, Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|min:3',
            'code' => 'required|string|min:3',
        ]);


        $department = Departement::all()->where('id', $request->departement_id)->first();

        //Mise a jour du cours
        $course->name = $request->name;
        $course->code = $request->code;
        $course->departement_id = $request->departement_id;
        $course->section = $department->section;

        $course->save();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('course.index')->with('success', 'Course successfully updated.');
    }

    // Fonction pour supprimer un cours
    public function delete(Cours $course)
    {
        // Supprimer le cours
        $course->delete();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('course.index')->with('success', 'the course has been successfully deleted.');
    }
}
