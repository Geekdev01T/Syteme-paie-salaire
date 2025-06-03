<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{

    //Pour la generation des fausses donnees
    use HasFactory;

    /**
     * Les employes qui appartiennent au departement.
     */
    public function employers(): HasMany
    {
        return $this->hasMany(Employer::class);
    }

    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'name',
        'code',
        'description',
        'section',
    ];
}
