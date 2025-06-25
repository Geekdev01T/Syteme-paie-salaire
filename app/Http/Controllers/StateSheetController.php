<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateFilterRequest;
use App\Models\Employer;
use Illuminate\Http\Request;

class StateSheetController extends Controller
{

    // Fonction pour afficher les employes
    public function index()
    {
        $title = 'Sheet State';
        $empint = 0;
        $empper = 0;

        // Récupérer les employés depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        $employes = Employer::paginate(20);

        // Logique pour afficher les états
        return view('states_sheet.index', compact('title', 'employes', 'empint', 'empper'));
    }

    //Fonction pour afficher la fiche d'état d'un employé specifique
    public function show(Employer $employe, StateFilterRequest $request)
    {
        $title = 'Sheet State';

        // Récupérer le mois actuel au format YYYY-MM
        // Récupère le mois filtré ou le mois courant
        $month = $request->input('month', now()->format('Y-m'));


        // Charger les états de l'employé pour le mois actuel
        $states = $employe->etats()
            ->where('date', 'like', $month . '%')
            ->orderBy('date', 'asc')
            ->get();


        //Total des heures travaillées ce mois
        $totalHours = $states->sum('hour');


        //Total des heures pour les etats de cours
        $totalStudyHours = $states->where('state', 'study')->sum('hour');
        $countStudy = 0;

        //Total des heures pour les etats de travail supervisé
        $totalSupervisedWorkHours = $states->where('state', 'supervised-work')->sum('hour');
        $countSupervisedWork = 0;

        //Total des jours de surveillance
        $totalDays = $states->where('state', 'monitoring')->count();
        $countMonitoring = 0;


        //Charger les retards de l'employé pour le mois actuel
        $delayStates = $employe->etatsRetard()
            ->where('date', 'like', $month . '%')
            ->orderBy('date', 'asc')
            ->get();


        //Total des heures de retard du mois
        $totalDelayHours = $delayStates->sum('hour');


        //Total des hours du mois
        $totalMonthHours = $totalHours - $totalDelayHours;


        // Récupérer l'employé spécifique
        return view('states_sheet.show', compact('title', 'employe', 'month', 'states', 'totalStudyHours', 'totalSupervisedWorkHours', 'totalHours', 'totalDays', 'delayStates', 'totalDelayHours', 'totalMonthHours', 'countStudy', 'countSupervisedWork', 'countMonitoring'));
    }


}
