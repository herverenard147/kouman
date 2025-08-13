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

    public function chambres()
    {
        return $this->belongsToMany(Chambre::class, 'equipements_chambres', 'idEquipement', 'idChambre')
                    ->using(EquipementChambre::class);
    }
}
