<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cours extends Model
{
    //Pour la generation des fausses donnees
    use HasFactory;


    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'name',
        'code',
        'section',
        'departement_id',
    ];

    /**
     * La relation avec le modèle Departement.
     */
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    /**
     *Ls employeurs qui sont associés à ce cours.
     */
    public function employers(): BelongsToMany
    {
        return $this->belongsToMany(Employer::class, 'cours_employers', 'cours_id', 'employer_id');
    }
}
