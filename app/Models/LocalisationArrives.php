<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalisationArrives extends Model
{
    use HasFactory;
    protected $table = 'localisation_arrive';
    protected $fillable = [
        'ville',
        'pays',
        'codePostal',
        'adresse',
        'longitude',
        'latitude',
    ];

    public function hebergements()
    {
        return $this->hasMany(Hebergement::class, 'idLocalisation');
    }
}
