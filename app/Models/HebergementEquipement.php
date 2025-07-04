<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HebergementEquipement extends Pivot
{
    protected $table = 'hebergement_equipements';
    protected $primaryKey = [
        'idHebergement',
        'idEquipement'
    ];
    public $incrementing = false;

    protected $fillable = [
        'idHebergement',
        'idEquipement'
    ];

    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class, 'idHebergement');
    }

    public function equipement()
    {
        return $this->belongsTo(Equipements::class, 'idEquipement');
    }
}
