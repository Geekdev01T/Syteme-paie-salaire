<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classe extends Model
{
    //

    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'name',
        'section'
    ];


    /**
     *Ls employeurs qui sont associés à cette classe.
     */
    public function employers(): BelongsToMany
    {
        return $this->belongsToMany(Employer::class, 'classe_employers', 'classe_id', 'employer_id');
    }
}
