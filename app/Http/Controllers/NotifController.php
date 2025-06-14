<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifController extends Controller
{
    //Fonction pour récupérer les notifications
    public function index()
    {
        //titre de la page
        $title = 'Notifications';

        return view('notifications', compact('title'));
    }
}
