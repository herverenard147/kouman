<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilite extends Model
{
    protected $fillable = ['type_service', 'service_id', 'date', 'disponible'];
    protected $casts = [
        'date' => 'datetime',
        'disponible' => 'boolean',
    ];
}
