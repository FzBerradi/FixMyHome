<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Client extends Controller
{
    public function index()
    {
        $idClient = auth()->user()->id;
        $villeClient = auth()->user()->Ville;
        $reservationsEnAttente = Reservation::where('Client_ID', $idClient)
            ->where('Status', 0)
            ->count();
        $partenairesDansVille = Partenaire::where('Ville', $villeClient)->count();

        return view('client.dashboard', compact('reservationsEnAttente', 'partenairesDansVille'));
    }
    public function demanderS()
    {
        return view("Client.demanderService");
    }
    public function showServices($categoryName)
    {
        $services = Service::where('Categorie', $categoryName)->get();
        return view('Client.showServices', compact('services', 'categoryName'));
    }
    public function enregistrerChoix(Request $request)
    {
        $serviceId = $request->input('service_id');

        $service = Service::findOrFail($serviceId);
        session([
            'Service_ID' => $service->id,
            'nom_service' => $service->Nom,
            'categorie' => $service->Categorie,
            'prix_service' => $service->Prix
        ]);

        return redirect('/choisirpartenaire');
    }

    public function choisir()
    {
        $serviceDemande = session('nom_service');
        $villeClient = auth()->user()->Ville;
        $partenaires = Partenaire::where('Ville', $villeClient)
            ->where('Services', 'like', '%' . $serviceDemande . '%')->paginate(3);
        return view("Client.topPartenaire", compact('partenaires'));
    }
    public function afficherProfile(Request $request)
    {
        $id = $request->id;
        $partenaire = Partenaire::with([
            'reservations' => function ($query) {
                $query->with('service')
                    ->where(function ($query) {
                        // Commentaires bilatéraux ou unilatéraux des partenaires plus anciens que 7 jours
                        $query->whereNotNull('Commentaire_Partenaire')
                            ->whereNotNull('Note_Client')
                            ->whereNotNull('Commentaire_Client')
                            ->whereDate('created_at', '>', now()->subDays(7))
                            ->orWhere(function ($query) {
                                $query->whereNotNull('Commentaire_Client')
                                    ->whereNotNull('Note_Client')
                                    ->whereNull('Commentaire_Partenaire')
                                    ->whereDate('created_at', '<=', now()->subDays(7));
                            });
                    })
                    ->limit(3);
            }
        ])->findOrFail($id);



        return view("Client.profilePartenaire", compact('partenaire'));
    }



    public function selectionnerPartenaire($partenaireId)
    {
        $partenaire = Partenaire::findOrFail($partenaireId);
        session([
            'Partenaire_ID' => $partenaire->id,
            'nom_partenaire' => $partenaire->Nom
        ]);
        session(['Partenaire_ID' => $partenaireId]);


        return redirect('/demande');
    }
    public function afficherPartenaires()
    {
        $serviceDemande = session('nom_service');
        $villeClient = auth()->user()->Ville;
        $partenaires = Partenaire::where('Ville', $villeClient)
            ->where('Services', 'like', '%' . $serviceDemande . '%')->paginate(5);
        return view("Client.allPartenaire", compact('partenaires'));
    }

    public function rechercher(Request $request)
    {
        $villeClient = auth()->user()->Ville;

        $serviceDemande = session('nom_service');
        $query = Partenaire::where('Ville', $villeClient)
            ->where('Services', 'LIKE', '%' . $serviceDemande . '%');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $numericSearch = is_numeric($search) ? (int) $search : null;
                $q->where('Nom', 'LIKE', "%{$search}%");
                if ($numericSearch !== null) {
                    $q->orWhere('NbExperience', '=', $numericSearch);
                }
            });
        }

        if ($noteSearch = $request->input('note')) {
            $query->whereHas('reservations', function ($q) use ($noteSearch) {
                $note = ($noteSearch === 'mauvais') ? '<' : '>=';
                $q->selectRaw('AVG(note_client) as moyenne_note')->groupBy('partenaire_id')->having('moyenne_note', $note, 3.5);
            });
        }

        $partenaires = $query->paginate(10); // Pagination avec 10 résultats par page

        // Retourner les partenaires paginés à la vue 'votre_vue' pour affichage
        return view('Client.allPartenaire', compact('partenaires'));
    }



    public function demande()
    {
        return view("Client.demande");
    }
    ////////////////////////////////////////////////
    public function serviceRealise()
    {
        $clientId = auth()->user()->id;
        $services = Reservation::with(['partenaire', 'service'])->where('Client_ID', $clientId)
            ->where('Status', 1)->paginate(5);
        return view("Client.serviceRealise", compact('services'));
    }
    public function enAttente()
    {
        $clientId = auth()->user()->id;
        $reservations = Reservation::with(['partenaire', 'service'])->where('Client_ID', $clientId)
            ->where('Status', 0)->paginate(5);
        return view("Client.reservationAttente", compact('reservations'));
    }
    ///////////////////////////////////
    public function profileC()
    {
        $id = auth()->user()->id;
        return view("Client.profile", compact('id'));
    }
    public function edit(\App\Models\Client $client)
    {
        return view("Client.modifierC", compact('client'));
    }
    public function update(Request $request, \App\Models\Client $client)
    {
        // Validation
        $formFields = $request->validate([
            'Nom' => 'required',
            'email' => 'required|email',
            'Adresse' => 'required',
            'Ville' => 'required',
        ]);
        $client->fill($formFields)->save();
        return redirect('/profil')->with('success', 'Votre profil a été bien modifié !');
    }








}
