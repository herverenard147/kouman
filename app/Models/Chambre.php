<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{

    use HasFactory;
    protected $table = 'chambres';
    protected $fillable = [
        'numero',               // numéro ou nom de la chambre
        'description',
        'prixParNuit',
        'devise',
        'stock',
        'capaciteMax',
        'nombreLits',
        'nombreSallesDeBain',
        'surface',
        'statut',
        'idPartenaire',      // hôtel qui enregistre
        'idTypeChambre',     // référence vers table types_chambres
        'idLocalisation',
        'idPolitiqueAnnulation',
    ];

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeChambre::class, 'idTypeChambre');
    }

    public function localisation()
    {
        return $this->belongsTo(Localisations::class, 'idLocalisation');
    }

    public function politiqueAnnulation()
    {
        return $this->belongsTo(PolitiquesAnnulation::class, 'idPolitiqueAnnulation');
    }

    public function images()
    {
        return $this->hasMany(ImagesChambre::class, 'idChambre');
    }

    public function disponibilites()
    {
        return $this->hasMany(Disponibilite::class, 'idChambre');
    }

    public function avis()
    {
        return $this->hasMany(Avis::class, 'idChambre');
    }

    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'chambre_equipements','idChambre', 'idEquipement')
                    ->using(EquipementChambre::class);
    }

    public function imagePrincipale()
    {
        return $this->hasOne(ImagesChambre::class, 'idChambre', 'id')->where('estPrincipale', true);
    }

    public function telephones()
    {
        return $this->morphMany(Telephone::class, 'phoneable');
    }
}
