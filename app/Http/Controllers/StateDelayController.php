<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtatRetardRequest;
use App\Models\Employer;
use App\Models\EtatRetard;
use Illuminate\Http\Request;

class StateDelayController extends Controller
{
    // Fonction pour afficher les états
    public function index()
    {
        $title = 'Delay State';
        $empint = 0;
        $empper = 0;

        // Récupérer les employés depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        $employes = Employer::paginate(10);

        // Logique pour afficher les états
        return view('states_delay.index', compact('title', 'employes', 'empint', 'empper'));
    }

    // Fonction pour éditer l'état d'un employé
    public function create(Employer $employe)
    {
        $title = 'Delay State';

        //recuperer tous les états de retard de l'employé specifique
        // $employe->load('etats');
        $delay_states = $employe->etatsRetard()->get()->sortByDesc('date');


        // Récupérer l'employé spécifique
        return view('states_delay.create', compact('title', 'employe', 'delay_states'));
    }

    //Fontion pour enregistrer les états de cours
    public function store(EtatRetardRequest $request)
    {

        // Enregistrement de l'état de cours
        EtatRetard::create([
            'date' => $request->date,
            'hour' => $request->hour,
            'comment' => $request->comment,
            'employer_id' => $request->employer_id,
        ]);

        // Redirection vers la liste des états avec un message de succès
        return redirect()->back()->with('success', 'Delay State recorded successfully.');
    }

    // Fonction pour éditer un état spécifique
    public function edit(EtatRetard $state_delay)
    {
        $title = 'Edit Delay State';

        // Récupérer l'employé associé à l'état
        $employe = $state_delay->employer;


        // Récupérer l'état spécifique
        return view('states_delay.edit', compact('title', 'state_delay', 'employe'));
    }

    // Fonction pour mettre à jour un état spécifique
    public function update(Request $request, EtatRetard $state_delay)
    {

        // Valider les données de la requête
        $request->validate([
            'date' => 'required|date',
            'hour' => 'required|integer|min:1|max:20',
            'comment' => 'required|string|max:255',
        ]);
        
        // Mettre à jour l'état avec les nouvelles données
        $state_delay->update([
            'date' => $request->date,
            'hour' => $request->hour,
            'comment' => $request->comment
        ]);

        // Récupérer l'employé associé à l'état
        $employe = $state_delay->employer;

        // Redirection vers la liste des états avec un message de succès
        return redirect()->route('state_delay.create', $employe->id)->with('success', 'Delay State updated successfully.');
    }

    public function up(EtatRetard $state_delay)
    {
        return "hello";
    }

    // Fonction pour supprimer un état spécifique
    public function delete(EtatRetard $state_delay)
    {
        // Supprimer l'état
        $state_delay->delete();

        // Redirection vers la liste des états avec un message de succès
        return redirect()->back()->with('success', 'Delay State deleted successfully.');
    }
}
