<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    //Pour la generation des fausses donnees
    use HasFactory;

    /**
     * Les departements qui appartiennent a l"employe.
     */
    public function departements(): BelongsToMany
    {
        return $this->belongsToMany(Departement::class);
    }

    /**
     * Les etats qui appartiennent a l'employe.
     */
    public function etats(): HasMany
    {
        return $this->hasMany(Etat::class);
    }

    /**
     * Les retards qui appartiennent a l'employe.
     */
    public function etatsRetard(): HasMany
    {
        return $this->hasMany(EtatRetard::class);
    }

    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'name',
        'first_name',
        'email',
        'password',
        'profile',
        'contact',
        'status',
        'honorary',
        'fixed_salary',
    ];
}
