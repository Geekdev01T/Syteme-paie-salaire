<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    //
    use HasFactory;

    /**
     * Les champs qui peuvent être assignés en masse.
     */
    protected $fillable = [
        'date',
        'hour',
        'state',
        'status',
        'employer_id',
    ];
    /**
     * La relation avec le modèle Employer.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

}
