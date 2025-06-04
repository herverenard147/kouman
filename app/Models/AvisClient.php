<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisClient extends Model
{
    protected $fillable = [
        'client_id',
        'type_service',
        'service_id',
        'commentaire',
        'note',
        'date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
