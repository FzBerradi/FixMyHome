<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Partenaire;
use App\Models\Reservation;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        $nombreDeClients = Client::count();
        $nombreDePartenaires = Partenaire::count();
        $reservationsRealisees = Reservation::where('status', 1)->count();

        return view('Admin.dashboard', compact('nombreDeClients', 'nombreDePartenaires', 'reservationsRealisees'));
    }
    
    public function partenaires()
    {
        $partenaires = Partenaire::paginate(7);
        return view("Admin.partenaires", compact('partenaires'));
    }
    public function clients()
    {
        $clients = Client::paginate(7);
        return view("Admin.clients", compact('clients'));
    }
    public function voirClient(Request $request)
    {
        $id = $request->id;
        $client = Client::with([
            'reservations' => function ($query) {
                $query->whereNotNull('Commentaire_Partenaire')
                    ->limit(3);

            }
        ])->findOrFail($id);
        return view("Admin.showClient", compact('client'));
    }
    public function voirPartenaire(Request $request)
    {
        $id = $request->id;
        $partenaire = Partenaire::with([
            'reservations' => function ($query) {
                $query->whereNotNull('Commentaire_Client')
                    ->whereNotNull('Note_Client')->limit(3);

            }
        ])->findOrFail($id);
        return view("Admin.showPartenaire", compact('partenaire'));
    }
    public function destroyC(Client $client)
    {
        $id = $client->id;
        $client->delete();
        return redirect("/ManageClients")->with('success', "Le client: " . $id . " a été bien  supprimé.");
    }
    public function destroyP(Partenaire $partenaire)
    {
        $id = $partenaire->id;
        $partenaire->delete();
        return redirect("/ManagePartenaires")->with('success', "Le partenaire: " . $id . " a été bien supprimé.");

    }
}
