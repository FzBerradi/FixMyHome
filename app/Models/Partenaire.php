<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Partenaire extends Authenticatable
{

    use Notifiable, HasFactory;

    protected $fillable = [
        "Nom",
        "email",
        "Photo",
        "Ville",
        "password",
        "NbExperience",
        "NumTel",
        "Disponibilite_Jours",
        "Services"
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'Partenaire_ID');
    }

}

