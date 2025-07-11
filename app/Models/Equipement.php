<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $table = 'equipements';
    protected $fillable = [
        'nom',
        'type'
    ];

    public function hebergements()
    {
        return $this->belongsToMany(Hebergement::class, 'hebergement_equipements', 'idEquipement', 'idHebergement')
                    ->using(HebergementEquipement::class);
    }

    public function excursions()
    {
        return $this->belongsToMany(Excursion::class, 'equipements_excursions', 'idEquipement', 'idExcursion');
    }

    public function evenements()
    {
        return $this->belongsToMany(Evenement::class, 'equipements_evenements', 'idEquipement', 'idEvenement');
    }
}
