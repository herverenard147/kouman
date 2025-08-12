<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    protected $table = 'excursions';
    protected $fillable = [
        'titre',
        'description',
        'duree',
        'prix',
        'devise',
        'capacite_max',
        'partenaire_id',
        'localisation_id',
        'localisation_idA',
        'statut',
        'stock',
        'nom_guide',
        'langues',
        'recurrence',
        'age_minimum',
        'conditions',
        'moyens_paiement',
    ];

    public function images()
    {
        return $this->hasMany(ImageExcursion::class, 'idExcursion', 'id');
    }

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'partenaire_id', 'id');
    }

    public function localisation()
    {
        return $this->belongsTo(Localisations::class, 'localisation_id', 'id');
    }

    public function localisationArrivee()
    {
        return $this->belongsTo(LocalisationArrives::class, 'localisation_idA', 'id');
    }

    public function dates()
    {
        return $this->hasMany(ExcursionDate::class, 'idExcursion', 'id');
    }

    public function equipements()
    {
        return $this->hasMany(EquipementExcursion::class,  'idExcursion', 'id');
    }
    public function telephones()
    {
        return $this->morphMany(Telephone::class, 'phoneable');
    }

    public function langues()
    {
        return $this->belongsToMany(Langue::class, 'excursion_langue');
    }

    public function moyensPaiement()
    {
        return $this->belongsToMany(MoyenPaiement::class, 'excursion_paiement');
    }

    public function avis()
    {
        return $this->hasMany(Avis::class, 'idExcursion', 'id');
    }

}
