<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\ReservationDeleted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Reservation extends Controller
{
    public function store(Request $request)
    {
        $service = Service::findOrFail(session('Service_ID'));
        $prixUnitaire = $service->Prix;
        $duree = $request->duree;
        $date = $request->dateR;
        $info = $request->inf;
        $prixTotal = $prixUnitaire * $duree;


        $reservation = \App\Models\Reservation::create([
            'Partenaire_ID' => session('Partenaire_ID'),
            'Service_ID' => session('Service_ID'),
            'Client_ID' => auth()->user()->id,
            'Date' => $date,
            'Duree' => $duree,
            'Prix' => $prixTotal,
            'Inf' => $info,
            'Status' => 0
        ]);
        return redirect('/reservationAttente')->with('success', 'Réservation a été bien faite!');
    }

    public function destroyR(\App\Models\Reservation $reservation)
    {
        $id = $reservation->id;
        $reservation->delete();
        return redirect("/reservationAttente")->with('success', "Votre réservation " . $id . " a été bien supprimé.");

    }

    public function ajouterCom($id)
    {
        $reservation = \App\Models\Reservation::with(['partenaire', 'service'])->findOrFail($id);
        return view("Client.addCom", compact('reservation'));
    }
    public function addCom(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string'
        ]);

        $reservation = \App\Models\Reservation::findOrFail($id);

        // Vérifier si la réservation a été créée il y a moins de 7 jours et si le commentaire du partenaire existe
        if ($reservation->created_at->diffInDays(now()) <= 7 ) {
            $reservation->Note_Client = $request->rating;
            $reservation->Commentaire_Client = $request->comment;
            $reservation->save();
            return redirect('/serviceRealise')->with('success', 'Commentaire pour la prestation ' . $id . ' ajouté avec succès !');
        } else {
            return redirect('/serviceRealise')->with('error', 'Impossible de laisser un commentaire pour ce service.'.$id. ' Vous avez depasse 7j');
        }
    }

    public function voirCom(Request $request)
    {
        $id = $request->id;
        $reservation = \App\Models\Reservation::findOrFail($id);
        return view("Client.voirCom", compact('reservation'));
    }
//Suppression de reservation apres 48h sans reponse
    public function deleteOldReservations()
    {
        //récupérer toutes les réservations en attente (status égal à 0) qui ont été créées il y a plus de 48 heures
        $reservations = \App\Models\Reservation::where('status', 0)
        ->where('created_at', '<', Carbon::now()->subHours(48))
        ->get();

        foreach ($reservations as $reservation) {
            // Envoyer un e-mail au client avant de supprimer la réservation
            $clientEmail = $reservation->client->email;
            Mail::to($clientEmail)->send(new ReservationDeleted($reservation));

            // Supprimer la réservation
            $reservation->delete();
        }
        // Facultatif : Vous pouvez également renvoyer une réponse si nécessaire
        return response()->json(['message' => 'Les réservations périmées ont été supprimées avec succès.']);
    }
}
