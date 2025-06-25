<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // Fonction pour afficher la liste des cours
    public function index()
    {
        // Titre de la page
        $title = 'Class';
        $classesfr = 0;
        $classesen = 0;

        // Récupérer les classes depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        // Remarque : la méthode orderBy doit être appelée avant paginate
        $classes = Classe::orderBy('id', 'asc')->paginate(20);

        return view('classes.index', compact('title', 'classes', 'classesfr', 'classesen'));
    }

    // Fonction pour afficher le formulaire de création d'une classe
    public function create()
    {
        // Titre de la page
        $title = 'Create Class';

        return view('classes.create', compact('title'));
    }

    // Fonction pour stocker une nouvelle classe
    public function store(ClassRequest $request)
    {

        // Création d'une classe
        // dd($request);

        Classe::create([
            'name' => $request->name,
            'section' => $request->section,
        ]);

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('class.index')->with('success', 'Class successfully created.');
    }

    // Fonction pour afficher une classe
    public function show(Classe $class)
    {
        // Titre de la page
        $title = 'Show Class';

        //Recuperer les employes de la classe
        $employes = $class->employers()->get();
        $count = $employes->count();

        return view('classes.show', compact('title', 'class', 'employes', 'count'));
    }

    // Fonction pour afficher le formulaire de modification d'une classe
    public function edit(Classe $class)
    {
        // Titre de la page
        $title = 'Edit Class';

        return view('classes.edit', compact('title', 'class'));
    }

    // Fonction pour mettre a jour une classe
    public function update(Classe $class, Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|min:3',
            'section' => 'required',
        ]);


        //Mise a jour de la classe
        $class->name = $request->name;
        $class->section = $request->section;

        $class->save();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('class.index')->with('success', 'Class successfully updated.');
    }

    // Fonction pour supprimer une classe
    public function delete(Classe $class)
    {
        // Supprimer la classe
        $class->delete();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('class.index')->with('success', 'the class has been successfully deleted.');
    }
}
