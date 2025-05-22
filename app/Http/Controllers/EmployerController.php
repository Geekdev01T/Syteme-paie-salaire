<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{

    //fonction pour afficher la liste des employeurs
    public function index()
    {
        //Title of the page
        $title = 'Employers';

        return view('employer.index', compact('title'));
    }

    //fonction pour afficher le formulaire de creation d'un employeur
    public function create()
    {
        //Title of the page
        $title = 'Create Employer';

        return view('employer.create',compact('title'));
    }

    //fonction pour afficher le formulaire de modification d'un employeur
    public function edit(Employer $employer)
    {
        //Title of the page
        $title = 'Edit Employer';

        return view('employer.edit', compact('title','employer'));
    }

}
