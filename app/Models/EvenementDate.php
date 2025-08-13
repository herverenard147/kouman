<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvenementDate extends Model
{
    protected $table = 'evenement_dates';
    protected $fillable = [
        'idEvenement',
        'date',
        'heure_debut',
        'duree',
        'places_disponibles'
    ];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'idEvenement', 'id');
    }
}
