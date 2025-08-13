<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagesChambre extends Model
{
    protected $table = 'images_chambres';
    protected $fillable = [
        'idChambre',
        'url',
        'estPrincipale'
    ];

    public function imageChambre()
    {
        return $this->belongsTo(Chambre::class, 'idChambre');
    }
}
