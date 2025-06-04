<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     protected $fillable = [
        'client_id',
        'date_reservation',
        'statut'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function services()
    {
        return $this->hasMany(ServiceReserve::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
