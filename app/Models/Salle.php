<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    //pour utiliser les factories
    use HasFactory;
    //champs acceptés pour la création et la mise à jour
    protected $fillable = ['name', 'code'];
}
