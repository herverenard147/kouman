<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';
    protected $primaryKey = 'idAvis';
    protected $fillable = [
        'idHebergement',
        'idUtilisateur',
        'note',
        'commentaire',
        'dateAvis'
    ];

    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class, 'idHebergement');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Client::class, 'idUtilisateur');
    }
}
