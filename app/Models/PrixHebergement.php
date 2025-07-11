<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrixHebergement extends Model
{
    protected $table = 'prix_hebergements';
    protected $fillable = [
        'idHebergement',
        'dateDebut',
        'dateFin',
        'prixParNuit',
        'devise'
    ];

    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class, 'idHebergement');
    }
}
