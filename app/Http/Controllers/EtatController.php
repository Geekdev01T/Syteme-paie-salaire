<?php

namespace App\Http\Controllers;

use App\Models\Employer;
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
    public function edit(Employer $employe)
    {
        $title = 'Edit Attendance State';

        // Récupérer l'employé spécifique
        return view('states.edit', compact('title'));
    }
}
