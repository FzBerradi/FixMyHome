<?php


use App\Http\Controllers\Admin;
use App\Http\Controllers\Client;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterClient;
use App\Http\Controllers\RegisterPartenaire;
use App\Http\Controllers\Reservation;
use App\Http\Controllers\Partenaire;
use Illuminate\Support\Facades\Route;

// Home Links
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
// Login
Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login'])->name('loginD');
Route::get('/logout', [LoginController::class, 'logout']);
// Register
Route::get('/register', [HomeController::class, 'register']);
// Register Client
Route::get('/registerClient', [RegisterClient::class, 'index']);
Route::post('/registerClient/store', [RegisterClient::class, 'store']);
// Register Partenaire
Route::get('/registerPartenaire', [RegisterPartenaire::class, 'index']);
Route::post('/registerPartenaire/store', [RegisterPartenaire::class, 'store']);
/////////////////////////////////////////////////////////////////////////////////////////////////////////
// Client Links
Route::get('/dashboard', [Client::class, 'index']);
// Demander service
Route::get('/demanderservice', [Client::class, 'demanderS']);

Route::get('/category/{categoryName}', [Client::class, 'showServices']);
Route::post('/enregistrer-choix', [Client::class, 'enregistrerChoix']);
Route::get('/choisirpartenaire', [Client::class, 'choisir']);

Route::get('/profilePartenaire/{id}', [Client::class, 'afficherProfile'])
    ->where('id', '\d+');
Route::get('/selectionnerPartenaire/{id}', [Client::class, 'selectionnerPartenaire']);

Route::get('/plus', [Client::class, 'afficherPartenaires']);
Route::get('/recherche-partenaires', [Client::class, 'rechercher']);


//////
Route::get('/profile', [Client::class, 'profile']);
//pour suppression des reservations non acceptees plus 48h
Route::get('/delete-old-reservations', [Reservation::class, 'deleteOldReservations']);




//Reservations
Route::get('/demande', [Client::class, 'demande']);
Route::post('/reservation', [Reservation::class, 'store']);
/////
Route::get('/reservationAttente', [Client::class, 'enAttente']);
Route::delete('/reservation/{reservation}', [Reservation::class, 'destroyR']);
Route::get('/serviceRealise', [Client::class, 'serviceRealise']);

Route::get('/addCom/{id}', [Reservation::class, 'ajouterCom'])->name('reservation.addCom');
Route::put('/reservation/{id}', [Reservation::class, 'addCom'])->name('reservation.add');

Route::get('/voirCom/{id}', [Reservation::class, 'voirCom'])
    ->where('id', '\d+');



// Profil Client
Route::get('/profil', [Client::class, 'profileC']);
Route::get('/client/{client}/edit', [Client::class, 'edit'])->name('client.edit');
Route::put('/client/{client}', [Client::class, 'update'])->name('client.update');


///////////////////////////////////////////////////////////////////////////////////////////////
// Partenaire Links
Route::get('/dashboardPartenaire', [Partenaire::class, 'index']);
// Profil Partenaire
Route::get('/profilPartenaire', [Partenaire::class, 'profileP']);
Route::get('/partenaire/{partenaire}/edit', [Partenaire::class, 'editp'])->name('partenaire.edit');
Route::put('/partenaire/{partenaire}', [Partenaire::class, 'updatep'])->name('partenaire.update');
// Reservation
Route::get('/reservations', [Partenaire::class, 'enAttente']);
Route::get('/detailsReservation/{id}', [Partenaire::class, 'details'])
    ->where('id', '\d+');
Route::get('/profileClient/{id}', [Partenaire::class, 'afficherProfile'])
    ->where('id', '\d+');
Route::post('/reservations/accept/{reservation}', [Partenaire::class, 'acceptReservation'])->name('reservations.accept');
Route::delete('/reservations/{reservation}', [Partenaire::class, 'refuseReservation'])->name('reservations.refuse');


Route::get('/serviceFait', [Partenaire::class, 'serviceFait']);

Route::get('/ajouterCom/{id}', [Partenaire::class, 'ajouterCom'])->name('partenaire.addCom');
Route::put('/res/{id}', [Partenaire::class, 'addCom'])->name('partenaire.add');

Route::get('/voirCommentaire/{id}', [Partenaire::class, 'voirCommentaire'])
    ->where('id', '\d+');


///////////////////////////////////////////////////////////////////////////////////////////////
// Admin Links
Route::get('/dashboardAdmin', [Admin::class, 'index']);
Route::get('/ManageClients', [Admin::class, 'clients']);
Route::get('/ManagePartenaires', [Admin::class, 'partenaires']);
Route::get('/voirClient/{id}', [Admin::class, 'voirClient'])
    ->where('id', '\d+');
Route::get('/voirPartenaire/{id}', [Admin::class, 'voirPartenaire'])
    ->where('id', '\d+');
Route::delete('/partenaire/{partenaire}', [Admin::class, 'destroyP']);
Route::delete('/client/{client}', [Admin::class, 'destroyC']);
