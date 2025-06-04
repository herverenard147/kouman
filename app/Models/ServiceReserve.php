<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceReserve extends Model
{
    protected $fillable = [
        'reservation_id',
        'type_service',
        'service_id'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
