<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;


class Commande extends Model
{
    protected $fillable = [
        'client_id',
        'ref',
        'name',
        'phone',
        'address',
        'country',
        'notes',
        'payment_method',
        'total',
        'shipping',
        'grand_total'
    ];

    public function produits()
    {
        return $this->hasMany(CommandeProduit::class);
    }
    // App\Models\Commande.php

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
