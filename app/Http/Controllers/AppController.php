<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function dashboard()
    {
        //Title of the page
        $title = 'Dashboard';

        // Total number of departments
        // Assuming you have a Department model and it is already imported

        $TotalDepartments = Departement::all()->count();

        // Total number of departments
        // Assuming you have a Department model and it is already imported
        $TotalEmployes = Employer::all()->count();

        $TotalEmployesPermanent = Employer::where('status', 'permanent')->count();

        // Total number of departments
        // Assuming you have a Department model and it is already imported
        $TotalAdmins = User::all()->count();

        // //Notification de la date de paiement et envoie des fiches d'états
        // $defaultPaymentDate = null;
        // $paymentNotification = [];

        // $defaultSendSheetDate = null;
        // $SendSheetNotification = [];

        // $currentDate = Carbon::now()->day;

        // $defaultDataQuery = Configuration::first();

        // // dd($currentDate);

        // if ($defaultDataQuery) {

        //     $defaultPaymentDate = $defaultDataQuery->paiement_date;
        //     $defaultSendSheetDate = $defaultDataQuery->state_sheet_date;

        //     $datePaymentSuffise = 'th';
        //     if ($defaultPaymentDate == 1) {
        //         $datePaymentSuffise = 'st';
        //     } elseif ($defaultPaymentDate == 2) {
        //         $datePaymentSuffise = 'nd';
        //     } elseif ($defaultPaymentDate == 3) {
        //         $datePaymentSuffise = 'rd';
        //     }

        //     $dateSendSheetSuffise = 'th';
        //     if ($defaultSendSheetDate == 1) {
        //         $dateSendSheetSuffise = 'st';
        //     } elseif ($defaultSendSheetDate == 2) {
        //         $dateSendSheetSuffise = 'nd';
        //     } elseif ($defaultSendSheetDate == 3) {
        //         $dateSendSheetSuffise = 'rd';
        //     }


        //     if ($currentDate  < $defaultPaymentDate) {
        //         $paymentNotification = [
        //             "header" => "Info System",
        //             "title" => "Paiment Date",
        //             "type" => "warning",
        //             "message" => "payment must be made no later than the " . $defaultDataQuery->paiement_date .$datePaymentSuffise  ." of this month.",
        //         ];
        //     }else{
        //         $nextMonth = Carbon::now()->addMonth();
        //         $nextMonthName = $nextMonth->format('F');

        //         $paymentNotification = [
        //             "header" => "Info System",
        //             "title" => "Paiment Date",
        //             "type" => "warning",
        //             "message" => "payment must be made no later than the " . $defaultDataQuery->paiement_date . $datePaymentSuffise  ." of " . $nextMonthName . ".",
        //         ];
        //     }

        //     if ($currentDate < $defaultSendSheetDate) {
        //         $SendSheetNotification = [
        //             "header" => "Info System",
        //             "title" => "Send State Sheet Date",
        //             "type" => "warning",
        //             "message" => "The states sheets must be sent no later than the " . $defaultSendSheetDate . $dateSendSheetSuffise  ." of this month."
        //         ];
        //     }else {
        //         $nextMonth = Carbon::now()->addMonth();
        //         $nextMonthName = $nextMonth->format('F');

        //         $SendSheetNotification = [
        //             "header" => "Info System",
        //             "title" => "Send State Sheet Date",
        //             "type" => "warning",
        //             "message" => "The states sheets must be sent no later than the " . $defaultSendSheetDate . $dateSendSheetSuffise  ." of " . $nextMonthName . "."
        //         ];
        //     }
        // }

        // // dd($paymentNotification);

        return view(
            'dashboard',
            compact('title', 'TotalDepartments', 'TotalEmployes', 'TotalAdmins', 'TotalEmployesPermanent')
        );
    }
}
