<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipementChambre extends Model
{
    protected $table = 'equipements_chambres';

    public $incrementing = false;

    protected $fillable = [
        'idChambre',
        'idEquipement'
    ];

    public function chambres()
    {
        return $this->belongsTo(Chambre::class, 'idChambre');
    }

    public function equipement()
    {
        return $this->belongsTo(Equipement::class, 'idEquipement');
    }
}
