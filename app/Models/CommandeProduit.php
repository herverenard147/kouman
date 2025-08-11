<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    protected $fillable = [
        'commande_id', 'product_id', 'name', 'image', 'categorie',
        'partenaire_id', 'quantity', 'price', 'subtotal'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}

