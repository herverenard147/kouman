<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';
    protected $fillable = [
        'idHebergement',
        'idClient',
        'idChambre',
        'idExcursion',
        'note',
        'commentaire',
        'dateAvis'
    ];

    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class);
    }

    public function excursion()
    {
        return $this->belongsTo(Excursion::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Client::class);
    }
}
