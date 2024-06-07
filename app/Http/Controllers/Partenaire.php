<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\ReservationRefused;
use App\Mail\ReservationAccepted;
use Illuminate\Support\Facades\Mail;

class Partenaire extends Controller
{
    public function index()
    {
        $idPartenaire = auth('partenaire')->user()->id;
        $reservationsEnAttente = Reservation::where('Partenaire_ID', $idPartenaire)
            ->where('Status', 0)
            ->count();
        $servicesRealises = Reservation::where('Partenaire_ID', $idPartenaire)
            ->where('Status', 1)
            ->count();


        return view('Partenaire.dashboard', compact('reservationsEnAttente', 'servicesRealises'));
    }
    public function enAttente()
    {
        $partenaireId = auth('partenaire')->user()->id;
        $reservations = Reservation::with(['client', 'service'])->where('Partenaire_ID', $partenaireId)
            ->where('Status', 0)->paginate(5);
        return view("Partenaire.reservationAttente", compact('reservations'));
    }

    public function details(Request $request)
    {
        $idReservation = $request->id;
        $reservation = Reservation::with('client', 'service')->findOrFail($idReservation);
        return view('partenaire.detailsReservation', compact('reservation'));
    }
    public function afficherProfile(Request $request)
    {
        $id = $request->id;

        $client = Client::with([
            'reservations' => function ($query) {
                $query->where(function($query) {
                    $query->whereNotNull('Commentaire_Partenaire')
                        ->whereNull('Commentaire_Client')
                        ->whereDate('created_at', '<', now()->subDays(7)); // Commentaires unilatéraux après 7 jours
                })
                ->orWhere(function($query) {
                    $query->whereNotNull('Commentaire_Partenaire')
                        ->whereNotNull('Commentaire_Client')
                        ->whereDate('created_at', '>', now()->subDays(7)); // Commentaires bilatéraux après 7 jours
                })
                ->orWhere(function($query) {
                    $query->whereNotNull('Commentaire_Partenaire')
                        ->whereNull('Commentaire_Client')
                        ->whereDate('created_at', '<', now()->subDays(7)); // Commentaires unilatéraux plus anciens que 7 jours
                })
                ->limit(3);
            }
        ])->findOrFail($id);




        return view("Partenaire.profileClient", compact('client'));
    }



    public function acceptReservation(Request $request, Reservation $reservation)
    {
        $idRes = $reservation->id;
        $reservation->Status = 1;
        $reservation->save();

        // Envoi d'un email au client
        Mail::to($reservation->client->email)->send(new ReservationAccepted($reservation));

        return redirect('/reservations')->with('success', 'La réservation a été acceptée et le client a été notifié.');
    }


    public function refuseReservation(Request $request, Reservation $reservation)
    {
        // Envoi d'un email de refus au client
        Mail::to($reservation->client->email)->send(new ReservationRefused($reservation));

        $reservation->delete();
        return redirect('/reservations')->with('success', 'La réservation a été refusée et le client a été notifié.');
    }

    public function serviceFait()
    {
        $partenaireId = auth('partenaire')->user()->id;
        $services = Reservation::with(['partenaire', 'service'])->where('Partenaire_ID', $partenaireId)
            ->where('Status', 1)->paginate(5);
        return view("Partenaire.serviceRealise", compact('services'));
    }
    public function ajouterCom($id)
    {
        $reservation = Reservation::with(['partenaire', 'service'])->findOrFail($id);
        return view("Partenaire.addCom", compact('reservation'));
    }
    public function addCom(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

        $reservation = Reservation::findOrFail($id);
        if ($reservation->created_at->diffInDays(now()) <= 7 ) {

        $reservation->Commentaire_Partenaire = $request->comment;
        $reservation->save();


        return redirect('/serviceFait')->with('success', 'Commentaire pour prestation ' . $id . ' ajouté avec succès !');
    }else {
        return redirect('/serviceFait')->with('error', 'Impossible de laisser un commentaire pour cette reservation.'.$id.'Vous avez depasse 7j');

}}



    public function voirCommentaire(Request $request)
    {
        $id = $request->id;
        $reservation = Reservation::findOrFail($id);
        return view("Partenaire.voirCom", compact('reservation'));
    }


















    public function profileP()
    {
        $id = auth('partenaire')->user()->id;
        return view("Partenaire.profile", compact('id'));
    }
    public function editp(\App\Models\Partenaire $partenaire)
    {
        return view("Partenaire.modifierP", compact('partenaire'));
    }
    public function updatep(Request $request, \App\Models\Partenaire $partenaire)
    {
        // Validation
        $formFields = $request->validate([
            'Nom' => 'required',
            'email' => 'required|email|unique:partenaires,email,' . $partenaire->id,
            'Ville' => 'required',
            "NbExperience" => 'required|integer',
            "NumTel" => 'required',
            "Disponibilite_Jours" => 'required',
            "Services" => 'required',
        ]);

        $partenaire->fill($formFields)->save();

        return redirect('/profilPartenaire')->with('success', 'Votre profil a été bien modifié !');
    }

}
