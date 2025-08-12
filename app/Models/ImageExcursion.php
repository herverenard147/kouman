<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageExcursion extends Model
{
    protected $table = 'images_excursions';
    protected $fillable = [
        'idExcursion',
        'url',
        'estPrincipale'
    ];

    public function excursion()
    {
        return $this->belongsTo(Excursion::class, 'idExcursion', 'id');
    }
}
