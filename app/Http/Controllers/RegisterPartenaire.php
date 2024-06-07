<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPartenaire extends Controller
{
    public function index()
    {
        return view("Partenaire.registerPartenaire");
    }
    public function store(Request $request)
    {
        // Validation
        $formFields = $request->validate([
            'Nom' => 'required',
            'email' => 'required|email|unique:partenaires',
            'Ville' => 'required',
            "Photo" => 'required|image',
            "NbExperience" => 'required|numeric',
            "NumTel" => 'required|numeric',

            "Disponibilite_Jours" => 'required|array',
            "Services" => 'required|array',
        ]);


        $formFields['Disponibilite_Jours'] = implode(',', $request->Disponibilite_Jours);
        $formFields['Services'] = implode(',', $request->Services);

        // Hash du mot de passe
        $formFields['password'] = Hash::make($request->password);

        // Gestion de l'upload de la photo
        if ($request->hasFile('Photo')) {
            $formFields['Photo'] = $request->file('Photo')->store('partner_photos', 'public');
        }

        // Insertion
        Partenaire::create($formFields);

        return redirect('/login')->with('success', 'Inscription bien faite, veuillez vous connectez !');
    }

}
