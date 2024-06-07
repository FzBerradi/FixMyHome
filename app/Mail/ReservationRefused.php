<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationRefused extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->markdown('emails.reservation.refused')
            ->subject('Réservation Refusée')
            ->with([
                'nomPartenaire' => $this->reservation->partenaire->Nom,
                'nomClient' => $this->reservation->client->Nom,
                'date' => $this->reservation->Date,
                'service' => $this->reservation->service->Nom
            ]);
    }
}
