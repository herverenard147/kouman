<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'code_iso'
    ];

    public function excursions()
    {
        return $this->belongsToMany(Excursion::class, 'excursion_langue');
    }
}
