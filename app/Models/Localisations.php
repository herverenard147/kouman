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
        'latitude',
        'longitude',
        'adresse'
    ];
    protected $primaryKey = 'idLocalisation';

    public function hebergements()
    {
        return $this->hasMany(Hebergement::class, 'idLocalisation');
    }
}
