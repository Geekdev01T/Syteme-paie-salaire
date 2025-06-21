<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    //

    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'name',
        'section'
    ];
}
