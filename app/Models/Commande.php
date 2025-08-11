<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'client_id','ref', 'name', 'phone', 'address', 'country', 'notes',
        'payment_method', 'total', 'shipping', 'grand_total'
    ];

    public function produits()
    {
        return $this->hasMany(CommandeProduit::class);
    }
}
