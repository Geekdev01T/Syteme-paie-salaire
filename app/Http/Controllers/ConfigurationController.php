<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigRequest;
use App\Http\Requests\EnterpriseRequest;
use App\Models\Configuration;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use PSpell\Config;

class ConfigurationController extends Controller
{
    //Fonction pour afficher la page de configuration(settings)
    public function index()
    {

        //Titre de la page
        $title = 'Settings';

        // Ici, vous pouvez ajouter la logique pour récupérer les données nécessaires à la vue
        // Par exemple, si vous avez besoin de récupérer des paramètres de configuration depuis la base de données,
        // vous pouvez le faire ici et les passer à la vue.
        $enterprise = Entreprise::first(); // Récupère la dernière configuration

        $configuration = Configuration::first(); // Récupère la dernière configuration
        // Si vous avez besoin de vérifier si la configuration existe, vous pouvez le faire ici

        // dd($enterprise);


        // Si aucune configuration n'existe, vous pouvez rediriger vers la page d'initialisation
        if (!$enterprise || !$configuration) {
            //Initialiser la configuration
            return redirect()->route('settings.initialize')->with('error', 'No configuration found. Please initialize first.');
        }

        return view('settings.index', compact('title', 'enterprise', 'configuration'));
    }

    //Fonction pour initialiser la configuration
    public function initialize()
    {
        //Vérifier si la configuration existe déjà
        if (Entreprise::count() > 0 && Configuration::count() > 0) {
            // Si une configuration existe déjà, rediriger vers la page de configuration avec un message d'erreur
            return redirect()->route('settings.index')->with('error', 'Configuration already exists.');
        }

        //Créer une nouvelle configuration avec des valeurs par défaut
        //Pour la table Entreprise
        Entreprise::create([
            'name' => 'Default Organization',
            'slogan' => 'Your Slogan Here',
            'type_organisation' => 'etablissement_scolaire',
            'logo' => null, // Vous pouvez ajouter un logo par défaut si nécessaire
            'email' => 'company@gmail.com',
            'phone1' => '+237 xxx xxx xxx',
            'phone2' => null,
            'address' => 'Bonaberi, Douala, Cameroon',
        ]);

        //Pour la table Configuration
        Configuration::create([
            'app_name' => 'STAFFPAY',
            'language' => 'english',
            'logo' => null, // Vous pouvez ajouter un logo par défaut si nécessaire
            'paiement_date' => '03',
            'state_sheet_date' => '30',
            'superised_work_fee' => 900,
            'monitoring_fee' => 3000,
        ]);


        // Rediriger vers la page de configuration avec un message de succès
        return redirect()->route('settings.index')->with('success', 'Configuration initialized successfully.');
    }

    //Fonction pour reinitialiser la configuration
    public function reset()
    {
        //Supprimer toutes les configurations existantes
        Entreprise::truncate();
        Configuration::truncate();

        //Rediriger vers la page de configuration avec un message de succès
        return redirect()->route('settings.initialize')->with('success');
    }



    //Fonction pour mettre à jour les parametres de l'entreprise
    public function update_enterprise(EnterpriseRequest $request)
    {
        //Trouver la configuration existante
        $enterprise = Entreprise::first();

        // dd(empty($request->file('logo')));

        //Mettre à jour les champs de la configuration
        $enterprise->update([
            'name' => $request->name,
            'slogan' => $request->slogan,
            'type_organisation' => $request->type_organisation,
            'email' => $request->email,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'address' => $request->address,
        ]);
        //Si le champ logo est vide, le mettre à null
        if (empty($request->file('logo'))) {
            $enterprise->logo = null;
        }
        //Sinon, stocker le logo
        else {
            // $path = $request->file('logo')->store('logos', 'public');
            // $enterprise->logo = $path;
            $file = $request->file('logo');
            $filename = 'logo_enterprise_' . date('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('logos', $filename, 'public');
            $enterprise->logo = $path;
        }
        //Enregistrer les modifications
        $enterprise->save();


        //Rediriger vers la page de configuration avec un message de succès
        return redirect()->route('settings.index')->with('success', 'Configuration updated successfully.');
    }

    //Fonction pour mettre à jour les parametres de l'application
    public function update_config(ConfigRequest $request)
    {

        //Trouver la configuration existante
        $configuration = Configuration::first();

        //Mettre à jour les champs de la configuration
        $configuration->update([
            'paiement_date' => $request->paiement_date,
            'state_sheet_date' => $request->state_sheet_date,
            'supervised_work_fee' => $request->supervised_work_fee,
            'monitoring_fee' => $request->monitoring_fee,
        ]);

        $configuration->save();

        //Rediriger vers la page de configuration avec un message de succès
        return redirect()->route('settings.index')->with('success', 'Configuration updated successfully.');
    }

    //Fontion pour mettre a jour les parametres de l'application
    public function update_app(Request $request)
    {
        //Valider les données de la requête
        $request->validate([
            'app_name' => 'required|string|max:255',
            'language' => 'required|in:english,french',
            'logo_app' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000' // 5MB max
        ]);

        //Trouver la configuration existante
        $configuration = Configuration::first();

        // dd(empty($request->file('logo_app')));

        //Mettre à jour les champs de la configuration
        $configuration->update([
            'app_name' => $request->app_name,
            'language' => $request->language,
        ]);
        // ->merge([
        //     'logo' => $request->file('logo') ? $request->file('logo')->store('logos', 'public') : $configuration->logo,
        //     // 'logo' => $request->file('logo') ? $request->file('logo')->store('logos', 'public') : null,
        // ]);

        //Si le champ logo est vide, le mettre à null
        if (empty($request->file('logo_app'))) {
            $configuration->logo = null;
        }else{
            $file = $request->file('logo_app');
            $filename = 'logo_app_' . date('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('logos', $filename, 'public');
            $configuration->logo = $path;
        }

        $configuration->save();

        //Rediriger vers la page de configuration avec un message de succès
        return redirect()->route('settings.index')->with('success', 'Configuration updated successfully.');
    }

}


