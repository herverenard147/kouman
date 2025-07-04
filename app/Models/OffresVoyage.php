<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffresVoyage extends Model
{
    protected $table = 'offres_voyage';
    protected $primaryKey = 'idOffreVoyage';
    protected $fillable = [
        'id',
        'titre',
        'description',
        'prix',
        'devise',
        'dateDebut',
        'dateFin',
        'destination',
        'dureeJours',
        'statut'
    ];

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'id');
    }
}
