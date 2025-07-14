<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenPaiement extends Model
{
    use HasFactory;

    protected $table = 'moyens_paiement';

    protected $fillable = [
        'nom',
        'description'
    ];

    public function excursions()
    {
        return $this->belongsToMany(Excursion::class, 'excursion_paiement');
    }
}
