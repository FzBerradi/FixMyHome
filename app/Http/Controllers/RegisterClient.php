<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterClient extends Controller
{
    public function index()
    {
        return view("Client.registerClient");
    }
    public function store(Request $request)
    {
        // Validation
        $formFields = $request->validate([
            'Nom' => 'required',
            'email' => 'required|email|unique:clients',
            'Adresse' => 'required',
            'Ville' => 'required',
        ]);
        $password = $request->password;
        $formFields['password'] = Hash::make($password);
        // Insertion
        Client::create($formFields);

        return redirect('/login')->with('success', 'Inscription bien faite, veuillez vous connectez !');
    }
}
