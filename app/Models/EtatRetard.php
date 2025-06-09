<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatRetard extends Model
{
    //
    use HasFactory;

    // Définir les attributs qui peuvent être assignés en masse
    protected $fillable = [
        'date',
        'hour',
        'comment',
        'employer_id',
    ];
    
    // Définir la relation avec le modèle Employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
