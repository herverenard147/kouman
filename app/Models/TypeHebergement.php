<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeHebergement extends Model
{
    protected $table = 'types_hebergement';
    protected $fillable = [
        'nomType',
        'idFamilleType'
    ];

    public function famille()
    {
        return $this->belongsTo(FamilleTypeHebergements::class, 'idFamilleType');
    }

    public function hebergements()
    {
        return $this->hasMany(Hebergement::class, 'id');
    }
}
