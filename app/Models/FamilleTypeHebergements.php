<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilleTypeHebergements extends Model
{

    use HasFactory;
    protected $table = 'familles_types_hebergement';
    protected $fillable = [
        'nomFamille'
    ];

    public function types()
    {
        return $this->hasMany(TypeHebergement::class, 'idFamilleType');
    }
}
