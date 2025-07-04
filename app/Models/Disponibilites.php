<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilites extends Model
{
    protected $table = 'disponibilites';
    protected $primaryKey = 'idDisponibilite';
    protected $fillable = [
        'idHebergement',
        'dateDebut',
        'dateFin',
        'estDisponible'
    ];

    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class, 'idHebergement');
    }
}
