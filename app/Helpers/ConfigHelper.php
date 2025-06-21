<?php

namespace App\Helpers;

use App\Models\Configuration;
use Carbon\Carbon;

class ConfigHelper
{


    //Fonction pour récupérer les données de l'application
    public static  function getAppData()
    {
        //Les données de l'application

        $defaultDataQuery = null;
        
        $defaultDataQuery = Configuration::first();

        return $defaultDataQuery;
    }

    //Fonction pour récupérer les notifications sur la dates de paiement et d'envoie des fiches d'états:
    public static function getPaymentAndSheetNotifications()
    {
        //Notification de la date de paiement et envoie des fiches d'états
        $defaultPaymentDate = null;
        $paymentNotification = [];

        $defaultSendSheetDate = null;
        $SendSheetNotification = [];

        $currentDate = Carbon::now()->day;

        $defaultDataQuery = Configuration::first();

        // dd($currentDate);

        if ($defaultDataQuery) {

            $defaultPaymentDate = $defaultDataQuery->paiement_date;
            $defaultSendSheetDate = $defaultDataQuery->state_sheet_date;

            $datePaymentSuffise = 'th';
            if ($defaultPaymentDate == 1) {
                $datePaymentSuffise = 'st';
            } elseif ($defaultPaymentDate == 2) {
                $datePaymentSuffise = 'nd';
            } elseif ($defaultPaymentDate == 3) {
                $datePaymentSuffise = 'rd';
            }

            $dateSendSheetSuffise = 'th';
            if ($defaultSendSheetDate == 1) {
                $dateSendSheetSuffise = 'st';
            } elseif ($defaultSendSheetDate == 2) {
                $dateSendSheetSuffise = 'nd';
            } elseif ($defaultSendSheetDate == 3) {
                $dateSendSheetSuffise = 'rd';
            }


            if ($currentDate  < $defaultPaymentDate) {
                $paymentNotification = [
                    "header" => "System Notification",
                    "title" => "Paiment Date",
                    "type" => "Information",
                    "author" => "System",
                    "message" => "payment must be made no later than the " . $defaultDataQuery->paiement_date . $datePaymentSuffise  . " of this month.",
                ];
            } else {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = $nextMonth->format('F');

                $paymentNotification = [
                    "header" => "System Notification",
                    "title" => "Paiment Date",
                    "type" => "Information",
                    "author" => "System",
                    "message" => "payment must be made no later than the " . $defaultDataQuery->paiement_date . $datePaymentSuffise  . " of " . $nextMonthName . ".",
                ];
            }

            if ($currentDate < $defaultSendSheetDate) {
                $SendSheetNotification = [
                    "header" => "System Notification",
                    "title" => "Send State Sheet Date",
                    "type" => "Information",
                    "author" => "System",
                    "message" => "The states sheets must be sent no later than the " . $defaultSendSheetDate . $dateSendSheetSuffise  . " of this month."
                ];
            } else {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = $nextMonth->format('F');

                $SendSheetNotification = [
                    "header" => "System Notification",
                    "title" => "Send state sheet date",
                    "type" => "Information",
                    "author" => "System",
                    "message" => "The states sheets must be sent no later than the " . $defaultSendSheetDate . $dateSendSheetSuffise  . " of " . $nextMonthName . "."
                ];
            }
        }


        return [
            'paymentNotification' => $paymentNotification,
            'SendSheetNotification' => $SendSheetNotification
        ];
    }
}
