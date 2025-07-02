<?php

namespace App\Http\Controllers;

use App\Models\Attribution;
use App\Models\Classe;
use App\Models\Cours;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\Salle;
use Illuminate\Http\Request;

class ProgrammationController extends Controller
{
    // Fonction pour afficher le formulaire de création d'un programme
    public function create()
    {
        // Titre de la page
        $title = 'Create Program';

        // Récupérer les employés pour le formulaire
        $employes = Employer::orderBy('name', 'asc')->get();
        // Récupérer les cours pour le formulaire
        $courses = Cours::orderBy('name', 'asc')->get();
        // Récupérer les classes pour le formulaire
        $classes = Classe::orderBy('name', 'asc')->get();
        //Récupérer les salles pour le formulaire
        $rooms = Salle::orderBy('name', 'asc')->get();

        //
        $currentYear = date('Y');
        $currentMonth = date('n');
        if ($currentMonth < 9) {
            $academicYear = $currentYear - 1 . '-' . $currentYear;
        } else {
            $academicYear = $currentYear . '-' . ($currentYear + 1);
        }

        $attributions = Attribution::where('annee_academique', $academicYear)->orderBy('id', 'asc')->get();

        // dd($attributions);

        // dd($employers, $courses, $classes);

        return view('programs.create', compact('title', 'attributions', 'courses', 'classes', 'rooms'));
    }
}
