<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $table = 'vols';
    protected $primaryKey = 'idVol';
    protected $fillable = [
        'id',
        'numeroVol',
        'villeDepart',
        'villeArrivee',
        'dateDepart',
        'dateArrivee',
        'prix',
        'devise',
        'placesDisponibles',
        'statut'
    ];

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'id');
    }
}
