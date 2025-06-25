<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalleRequest;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    // Fonction pour afficher la liste des salles
    public function index()
    {
        // Titre de la page
        $title = 'Rooms List';

        // Récupérer les salles depuis la base de données
        // Utilisation de la pagination pour limiter le nombre d'enregistrements affichés par page (10 par exemple)
        // Remarque : la méthode orderBy doit être appelée avant paginate
        $rooms = Salle::orderBy('id', 'asc')->paginate(20);

        return view('rooms.index', compact('title', 'rooms'));
    }

    // Fonction pour afficher le formulaire de création d'une salle
    public function create()
    {
        // Titre de la page
        $title = 'Create Room';

        return view('rooms.create', compact('title'));
    }

    // Fonction pour stocker une nouvelle classe
    public function store(SalleRequest $request)
    {

        // Création d'une salle
        // dd($request);

        Salle::create([
            'name' => $request->name,
            'code' => $request->code
        ]);

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('room.index')->with('success', 'Room successfully created.');
    }

    // // Fonction pour afficher une salle spécifique
    // public function show(Salle $room)
    // {
    //     // Titre de la page
    //     $title = 'Show Room';

    //     return view('rooms.show', compact('title', 'room'));
    // }


    // Fonction pour afficher le formulaire de modification d'une classe
    public function edit(Salle $room)
    {
        // Titre de la page
        $title = 'Edit Room';

        return view('rooms.edit', compact('title', 'room'));
    }

    // Fonction pour mettre a jour une salle
    public function update(Salle $room, Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|min:3',
            'code' => 'required|string|min:3',
        ]);

        // Mise a jour de la salle
        $room->name = $request->name;
        $room->code = $request->code;

        $room->save();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('room.index')->with('success', 'Room successfully updated.');
    }

    // Fonction pour supprimer une salle
    public function delete(Salle $room)
    {
        // Supprimer la salle
        $room->delete();

        // Rediriger vers la liste avec un message de succès
        return redirect()->route('room.index')->with('success', 'Room successfully deleted.');
    }
}
