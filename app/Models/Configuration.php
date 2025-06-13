<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    use HasFactory;

    //Champs accessible
    protected $fillable = [
        'app_name',
        'language',
        'logo',
        'paiement_date',
        'state_sheet_date',
        'supervised_work_fee',
        'monitoring_fee'
    ];
}
