<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localisations extends Model
{
    protected $table = 'localisations';
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
