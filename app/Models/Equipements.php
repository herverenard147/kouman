<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipements extends Model
{
    protected $table = 'equipements';
    protected $fillable = [
        'nom'
    ];
    protected $primaryKey = 'idEquipement';

    public function hebergements()
    {
        return $this->belongsToMany(Hebergement::class, 'hebergement_equipements', 'idEquipement', 'idHebergement')
                    ->using(HebergementEquipement::class);
    }
}
