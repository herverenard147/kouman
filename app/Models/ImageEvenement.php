<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageEvenement extends Model
{
    protected $table = 'images_evenements';
    protected $fillable = ['idEvenement', 'url', 'estPrincipale'];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'idEvenement', 'idEvenement');
    }
}
