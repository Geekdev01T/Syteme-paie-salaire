<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'cours_id',
        'classe_id',
        'annee_academique',
    ];

    /**
     * Get the employer associated with the attribution.
     */
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Get the course associated with the attribution.
     */
    public function cours(): BelongsTo
    {
        return $this->belongsTo(Cours::class);
    }

    /**
     * Get the class associated with the attribution.
     */
    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }
}
