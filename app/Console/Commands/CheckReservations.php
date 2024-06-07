<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Mail\ReservationDeleted;
use Illuminate\Support\Facades\Mail;

class CheckReservations extends Command
{
    protected $signature = 'reservations:check';
    protected $description = 'Check and delete pending reservations older than 48 hours';

    public function handle()
    {// récupère toutes les réservations en attente (status égal à 0) qui ont été créées il y a plus de 48 heures.
        //elle envoie un e-mail au client concerné en utilisant la classe ReservationDeleted qui doit être une classe de Mailing
        // puis elle supprime la réservation
        $reservations = Reservation::where('status', 0)
            ->where('created_at', '<', Carbon::now()->subHours(48))
            ->get();

        foreach ($reservations as $reservation) {
            // Envoyer un e-mail au client avant de supprimer la réservation
            $clientEmail = $reservation->client->email;
            Mail::to($clientEmail)->send(new ReservationDeleted($reservation));

            // Supprimer la réservation
            $reservation->delete();
        }

        $this->info('Pending reservations older than 48 hours have been deleted.');
    }
}
