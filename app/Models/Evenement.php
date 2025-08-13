<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = 'evenements';
    protected $fillable = [
        'titre',
        'description',
        'duree',
        'prix',
        'stock',
        'devise',
        'capacite_max',
        'partenaire_id',
        'localisation_id',
        'statut'
    ];

    public function images()
    {
        return $this->hasMany(ImageEvenement::class, 'idEvenement');
    }

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'partenaire_id');
    }

    public function localisation()
    {
        return $this->belongsTo(Localisations::class, 'localisation_id');
    }

    public function dates()
    {
        return $this->hasMany(EvenementDate::class, 'idEvenement');
    }

    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'equipements_evenements', 'idEvenement', 'idEquipement');
    }
    public function telephones()
    {
        return $this->morphMany(Telephone::class, 'phoneable');
    }
}
