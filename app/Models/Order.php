<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Spécifie la table française
    protected $table = 'commandes';

    // Relation avec les produits commandés
    public function products()
    {
        return $this->hasMany(CommandeProduit::class, 'commande_id');
    }
}
