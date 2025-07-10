<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    protected $table = 'disponibilites';
    protected $fillable = [
        'dateDebut',
        'dateFin',
        'estDisponible'
    ];

    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class);
    }
}
