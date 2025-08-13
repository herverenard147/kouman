<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{

    use HasFactory;
    protected $table = 'hebergements';
    protected $fillable = [
        'nom',
        'description',
        'prixParNuit',
        'devise',
        'stock',
        'noteMoyenne',
        'nombreChambres',
        'nombreSallesDeBain',
        'idType',
        'idLocalisation',
        'idPartenaire',
        'idPolitiqueAnnulation',
        'capaciteMax',
        'statut',
        'heureArrivee',
        'heureDepart'
    ];

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeHebergement::class, 'idType');
    }

    public function localisation()
    {
        return $this->belongsTo(Localisations::class, 'idLocalisation');
    }

    public function politiqueAnnulation()
    {
        return $this->belongsTo(PolitiquesAnnulation::class, 'idPolitiqueAnnulation');
    }

    public function prix()
    {
        return $this->hasMany(PrixHebergement::class, 'idHebergement');
    }

    public function images()
    {
        return $this->hasMany(ImagesHebergement::class, 'idHebergement');
    }

    public function disponibilites()
    {
        return $this->hasMany(Disponibilite::class, 'idHebergement');
    }

    public function avis()
    {
        return $this->hasMany(Avis::class, 'idHebergement');
    }

    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'hebergement_equipements','idHebergement', 'idEquipement')
                    ->using(HebergementEquipement::class);
    }

    public function imagePrincipale()
    {
        return $this->hasOne(ImagesHebergement::class, 'idHebergement', 'id')->where('estPrincipale', true);
    }

    public function prixSaisonniers()
    {
        return $this->hasMany(PrixHebergement::class, 'idHebergement', 'id');
    }

    public function telephones()
    {
        return $this->morphMany(Telephone::class, 'phoneable');
    }
}
