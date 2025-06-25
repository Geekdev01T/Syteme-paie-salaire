<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classe extends Model
{
    //pour utiliser les factories
    use HasFactory;

    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'name',
        'code',
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
