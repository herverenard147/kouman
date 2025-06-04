<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    protected $fillable = [
        'nom',
        'type',
        'description',
        'prix_par_nuit',
        'partenaire_id'
    ];

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
}
