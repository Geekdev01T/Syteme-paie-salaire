<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement_employer extends Model
{
    //
    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'departement_id',
        'employer_id',
    ];
}
