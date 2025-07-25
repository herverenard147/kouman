<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Partenaire extends Authenticatable implements MustVerifyEmail, AuthenticatableContract
{
    use HasFactory, Notifiable;

    use CanResetPasswordTrait;

    protected $table = 'partenaires';
    protected $fillable = [
        'nom_entreprise',
        'email',
        'password',
        'type',
        'téléphone',
        'adresse',
        'siteWeb',
        'statut',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hebergements()
    {
        return $this->hasMany(Hebergement::class);
    }

    public function vols()
    {
        return $this->hasMany(Vol::class);
    }

    public function excursions()
    {
        return $this->hasMany(Excursion::class);
    }

    public function evenements()
    {
        return $this->hasMany(Evenement::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\PartenaireResetPasswordNotification($token));
    }
}
