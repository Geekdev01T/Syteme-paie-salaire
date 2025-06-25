<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours_employer extends Model
{
    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'employer_id',
        'cours_id',
    ];
}

