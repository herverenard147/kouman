<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagesHebergement extends Model
{
    protected $table = 'images_hebergements';
    protected $fillable = [
        'idHebergement',
        'url',
        'estPrincipale'
    ];

    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class, 'idHebergement');
    }
}
