<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComparaisonPrix extends Model
{
    protected $table = 'comparaison_prix'; 
    protected $fillable = [
        'client_id',
        'date_comparaison',
        'resultat'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
