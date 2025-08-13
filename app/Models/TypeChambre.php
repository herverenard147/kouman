<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeChambre extends Model
{
    use HasFactory;
    protected $table = 'types_chambres';
    protected $fillable = [
        'nomType',
    ];

    public function chambre()
    {
        return $this->hasMany(Chambre::class, 'id');
    }

}
