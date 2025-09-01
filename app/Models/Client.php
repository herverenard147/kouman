<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens; // pour Sanctum
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        // 'prenom',
        'email',
        'password',
        'phone',
        // 'adresse',
        // 'ville',
        // 'pays',
        // 'code_postal',
        // 'date_naissance',
        // 'genre',
        // 'photo_profil',
        // 'langue_preferee',
        // 'newsletter',
        'birthdate',
        'identityNumber',
        'acceptTerms',
        'email_verified_at',
        'remember_token'
    ];

    protected $hidden = ['mot_de_passe', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'newsletter' => 'boolean',
        'date_naissance' => 'date',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class, 'client_id');
    }


    public function notifications()
    {
        return $this->hasMany(Notification::class, 'client_id');
    }

    public function comparaisons()
    {
        return $this->hasMany(ComparaisonPrix::class, 'client_id');
    }
}
