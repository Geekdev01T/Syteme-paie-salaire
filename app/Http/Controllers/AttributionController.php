<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributionRequest;
use App\Models\Attribution;
use App\Models\Classe;
use App\Models\Cours;
use App\Models\Employer;
use Illuminate\Http\Request;

class AttributionController extends Controller
{
    //fonction pour afficher la liste des attributions
    public function index()
    {
        //title
        $title = 'Attribution';

        //Recuperer les attributions de la BD
        $attributions = Attribution::paginate(20);

        return view('attributions.index', compact('title', 'attributions'));
    }

    //fonction pour afficher le formulaire de création d'une attribution
    public function create()
    {
        //title
        $title = 'Create Attribution';

        //Recuperer tous les employeurs, cours et classes pour le formulaire
        $employes = Employer::all()->sortBy('name');
        $courses = Cours::all()->sortBy('name');
        $classes = Classe::all()->sortBy('name');


        return view('attributions.create', compact('title', 'employes', 'courses', 'classes'));
    }


    public function getCours($id)
    {
        $employe = Employer::findOrFail($id);
        $cours = $employe->cours; // relation belongsToMany
        return response()->json($cours);
    }

    //fonction utiliser avec ajax pour afficher les cours
    public function getClasses($id)
    {
        $employe = Employer::findOrFail($id);
        $classes = $employe->classes; // relation belongsToMany
        return response()->json($classes);
    }

    //fonction pour enregistrer les attributions
    public function store(AttributionRequest $request){

        // dd($request);
        //Enregistrement dans la bd
        Attribution::create([
            'employer_id' => $request->employer_id,
            'cours_id' => $request->cours_id,
            'classe_id' => $request->classe_id,
            'annee_academique' => $request->annee_academique,
        ]);

        return redirect()->route('attribution.index')->with('success', 'Attribution created successfully.');

    }

    //fonction pour afficher le formulaire de mise a jour
    public function edit(Attribution $attribution)
    {
        //title
        $title = 'Attribution';

        //Recuperer tous les cours et classes de l'employer pour le formulaire
        $employe = Employer::findOrFail($attribution->employer_id);
        $courses = $employe->cours; // relation belongsToMany

        $employe = Employer::findOrFail($attribution->employer_id);
        $classes = $employe->classes; // relation belongsToMany


        return view('attributions.edit', compact('title','attribution', 'courses', 'classes'));
    }

    //fonction pour la mise a jour
    public function update(Attribution $attribution, AttributionRequest $request)
    {
        //title
        $attribution->classe_id = $request->classe_id;
        $attribution->cours_id = $request->cours_id;
        $attribution->save();


        return redirect()->route('attribution.index')->with('success', 'Attribution successfully updated.');
    }


    //fonction pour supprimer une attribution
    public function delete(Attribution $attribution){

        // Supprimer l'attribution
        $attribution->delete();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('attribution.index')->with('success', 'the attribution has been successfully deleted.');
    }


}
