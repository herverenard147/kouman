<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
   protected $fillable = [
        'nom_entreprise',
        'email',
        'mot_de_passe'
    ];

    public function hebergements()
    {
        return $this->hasMany(Hebergement::class);
    }

    public function vols()
    {
        return $this->hasMany(Vol::class);
    }

    public function excursions()
    {
        return $this->hasMany(Excursion::class);
    }

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }
}
