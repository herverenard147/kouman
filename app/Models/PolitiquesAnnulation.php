<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolitiquesAnnulation extends Model
{
    protected $table = 'politiques_annulation';
    protected $fillable = [
        'nom',
        'description'
    ];

    public function hebergements()
    {
        return $this->hasMany(Hebergement::class, 'idPolitiqueAnnulation');
    }
}
