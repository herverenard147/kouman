<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = ['numero'];

    public function phoneable()
    {
        return $this->morphTo();
    }
}
