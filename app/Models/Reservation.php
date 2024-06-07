<?php

namespace App\Models;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Partenaire_ID',
        'Service_ID',
        'Client_ID',
        'Date',
        'Duree',
        'Prix',
        'Status',
        'Commentaire_Client',
        'Note_Client',
        'Commentaire_Partenaire',
        'Inf'
    ];
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class, 'Partenaire_ID');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'Service_ID');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'Client_ID');
    }
}
