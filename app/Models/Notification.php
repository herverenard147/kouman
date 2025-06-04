<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'client_id',
        'message',
        'lu',
        'date_envoi'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
