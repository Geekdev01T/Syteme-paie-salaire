<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginEmployeController extends Controller
{
    //pour afficher la page de connexion pour employe
    public function loginEmp(){

        return view('pointages.login');
    }

    //Pour afficher le formulaire d'initialisation si c'est leur premiere fois
    public function initEmp(){

        return view('pointages.initialize');
    }
}
