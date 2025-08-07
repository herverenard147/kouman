<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excursion extends Model
{
    protected $table = 'excursions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titre',
        'description',
        'duree',
        'prix',
        'devise',
        'capacite_max',
        'partenaire_id',
        'localisation_id',
        'statut',
        'stock',
        'itineraire',
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

    public function dates()
    {
        return $this->hasMany(ExcursionDate::class, 'idExcursion', 'id');
    }

    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'equipements_excursions', 'idExcursion', 'id');
    }
    public function telephone()
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
        return $this->hasMany(AvisClient::class);
    }

}
