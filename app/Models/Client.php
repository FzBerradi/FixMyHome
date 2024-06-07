<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{

    use Notifiable, HasFactory;

    protected $fillable = [
        "Nom",
        "email",
        "Adresse",
        "Ville",
        "password"
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'Client_ID');
    }

}
