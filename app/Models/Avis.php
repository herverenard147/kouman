<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';
    protected $fillable = [
        'idHebergement',
        'note',
        'commentaire',
        'dateAvis'
    ];

    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Client::class);
    }
}
