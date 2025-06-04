<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function avis()
    {
        return $this->hasMany(AvisClient::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function comparaisons()
    {
        return $this->hasMany(ComparaisonPrix::class);
    }
}
