<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'administrateurs'; 

    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    /**
     * Indique à Laravel quelle colonne contient le mot de passe.
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
