<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipementExcursion extends Model
{
    protected $table = 'equipements_excursions';
    protected $fillable = [
        'nom',
    ];

    public function excursions()
    {
        return $this->belongsTo(Excursion::class, 'idExcursion');
    }
}
