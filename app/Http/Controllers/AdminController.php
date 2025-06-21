<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Fonction pour afficher la liste des admins
    public function index(){
        //Titre de la page
        $title = 'List Admin';

        //Retourner la vue
        return view('admins.index', compact('title'));
    }

    //Fonction pour afficher l'interface de création des admins
    public function create()
    {
        //Titre de la page
        $title = 'Create Admin';

        //Retourner la vue
        return view('admins.edit', compact('title'));
    }
}
