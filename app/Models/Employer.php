<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    //champs acceptés pour la création et la mise à jour
    protected $fillable = [
        'name',
        'first_name',
        'email',
        'contact',
        'status'
    ];
}
