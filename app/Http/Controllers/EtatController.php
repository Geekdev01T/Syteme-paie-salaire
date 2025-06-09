<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtatRequest;
use App\Models\Employer;
use App\Models\Etat;
use Illuminate\Http\Request;

class EtatController extends Controller
{
    // Fonction pour afficher les états
    public function index()
    {
        $title = 'Attendance State';
        $empint = 0;
        $empper = 0;

        // Récupérer les employés depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        $employes = Employer::paginate(10);

        // Logique pour afficher les états
        return view('states.index', compact('title', 'employes', 'empint', 'empper'));
    }

    // Fonction pour éditer l'état d'un employé
    public function create(Employer $employe)
    {
        $title = 'Attendance State';

        //recuperer tous les états de l'employé specifique
        // $employe->load('etats');
        $states = $employe->etats()->get()->sortByDesc('date');

        // Initialiser les états
        $state_study = 0;
        $state_supervised = 0;
        $state_monitoring = 0;

        // Récupérer l'employé spécifique
        return view('states.create', compact('title', 'employe', 'states', 'state_study', 'state_supervised', 'state_monitoring'));
    }

    //Fontion pour enregistrer les états de cours
    public function store(EtatRequest $request)
    {

        // Enregistrement de l'état de cours
        Etat::create([
            'date' => $request->date,
            'hour' => $request->hour,
            'state' => $request->state,
            'employer_id' => $request->employer_id,
        ]);

        // Redirection vers la liste des états avec un message de succès
        return redirect()->back()->with('success', 'State recorded successfully.');
    }

    // Fonction pour éditer un état spécifique
    public function edit(Etat $state)
    {
        $title = 'Edit Attendance State';

        // Récupérer l'employé associé à l'état
        $employe = $state->employer;


        // Récupérer l'état spécifique
        return view('states.edit', compact('title', 'state', 'employe'));
    }

    // Fonction pour mettre à jour un état spécifique
    public function update(EtatRequest $request, Etat $state)
    {
        // Mettre à jour l'état avec les nouvelles données
        $state->update([
            'date' => $request->date,
            'hour' => $request->hour,
            'state' => $request->state,
        ]);

        // Récupérer l'employé associé à l'état
        $employe = $state->employer;

        // Redirection vers la liste des états avec un message de succès
        return redirect()->route('state.create', $employe->id)->with('success', 'State updated successfully.');
    }

    // Fonction pour supprimer un état spécifique
    public function delete(Etat $state)
    {
        // Supprimer l'état
        $state->delete();

        // Redirection vers la liste des états avec un message de succès
        return redirect()->back()->with('success', 'State deleted successfully.');
    }

}
