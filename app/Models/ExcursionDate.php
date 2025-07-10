<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExcursionDate extends Model
{
    protected $table = 'excursion_dates';
    protected $fillable = [
        'idExcursion',
        'date',
        'heure_debut',
        'places_disponibles',
    ];

    public function excursion()
    {
        return $this->belongsTo(Excursion::class, 'idExcursion', 'id');
    }
}
