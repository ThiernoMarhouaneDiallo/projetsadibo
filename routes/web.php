<?php

//importation des bibliothéques et des controleurs de l'application

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\ReceveurController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\RetraitController;
use App\Http\Controllers\BeneficeController;
use Illuminate\Support\Facades\Route;

//Definition des routes de l'application

//les routes accueil et utilisateurs
//Route::get( '/',[UtilisateurController::class,"accueil"])->name("accueil");
Route::get('/creationutilisateur',[UtilisateurController::class,"creationutilisateur"])->name("creationutilisateur");
Route::get('/listeutilisateur',[UtilisateurController::class,"listeutilisateur"])->name("listeutilisateur");
Route::post('/utilisateur/creation',[UtilisateurController::class,"enregistrer"])->name("utilisateur.ajouter");
Route::delete('/utilisateur/{utilisateur}',[UtilisateurController::class,"delete"])->name("utilisateur.supprimer");
 
//les routes partenaires
Route::get('/creationpartenaire',[PartenaireController::class,"creationpartenaire"])->name("creationpartenaire");
Route::get('/listepartenaire',[PartenaireController::class,"listepartenaire"])->name("listepartenaire");
Route::post('/partenaire/creation',[PartenaireController::class,"enregistrer"])->name("partenaire.ajouter");
Route::delete('/partenaire/{partenaire}',[PartenaireController::class,"delete"])->name("partenaire.supprimer");
Route::get('edit/partenaire/{id}',[PartenaireController::class,"edite"])->name('edite_partenaire');
Route::put('/update/partenaire/{id}',[PartenaireController::class,"update"])->name('update_partenaire');
 

//les routes clients
Route::get('/creationclient',[ClientController::class,"creationclient"])->name("creationclient");
Route::post('/client/creation',[ClientController::class,"enregistrer"])->name("client.ajouter");
Route::get('/listeclient',[ClientController::class,"listeclient"])->name("listeclient");
Route::delete('/client/{client}',[ClientController::class,"delete"])->name("client.supprimer");
Route::get('edit/client/{id}',[ClientController::class,"edite"])->name('edite_client');
Route::put('/update/client/{id}',[ClientController::class,"update"])->name('update_client');


//les routes receveur
Route::get('/creationreceveur',[ReceveurController::class,"creationreceveur"])->name("creationreceveur");
Route::get('/listereceveur',[ReceveurController::class,"listereceveur"])->name("listereceveur");
Route::post('/receveur/creation',[ReceveurController::class,"enregistrer"])->name("receveur.ajouter");
Route::delete('/receveur/{receveur}',[ReceveurController::class,"delete"])->name("receveur.supprimer");
Route::get('edit/receveur/{id}',[ReceveurController::class,"edite"])->name('edite_receveur');
Route::put('/update/receveur/{id}',[ReceveurController::class,"update"])->name('update_receveur');

//les routes depot dans un compte client
Route::get('/creationdepot',[DepotController::class,"creationdepot"])->name("creationdepot");
Route::get('/listedepot',[DepotController::class,"listedepot"])->name("listedepot");
Route::post('/depot/creation',[DepotController::class,"enregistrer"])->name("depot.ajouter");
Route::delete('/depot/{depot}',[DepotController::class,"annuler"])->name("depot.annuler");
Route::get('/paiement_depot',[DepotController::class,"paiement"])->name("depot.paiement");
Route::get('/detail_depot/{id}',[DepotController::class,"show"])->name('detail_depot');
Route::get('edit/depot/{id}',[DepotController::class,"edite"])->name('edite_depot');
Route::put('/update/depot/{id}',[DepotController::class,"update"])->name('update_depot');

//les routes retrait dans un compte client 
//Route::get('/creationretrait',[RetraitController::class,"creationretrait"])->name("creationretrait");
Route::post('/retrait/creation',[RetraitController::class,"paiement"])->name("retrait.ajouter");
Route::get('payer/depot/{id}',[DepotController::class,"payer"])->name('creationretrait');
Route::get('/listeretrait',[RetraitController::class,"listeretrait"])->name("listeretrait");
//Route::post('/retrait/creation',[RetraitController::class,"enregistrer"])->name("retrait.ajouter");
Route::delete('/retrait/{retrait}',[RetraitController::class,"annuler"])->name("retrait.annuler");

//les routes Benefice
Route::get( '/',[BeneficeController::class,"accueil"])->name("accueil");
Route::get('/creationcaisse',[BeneficeController::class,"creationcaisse"])->name("creationcaisse");
Route::get('/listecaisse',[BeneficeController::class,"listecaisse"])->name("listecaisse");
Route::post('/caisse/creation',[BeneficeController::class,"enregistrer"])->name("caisse.ajouter");
Route::delete('/caisse/{caisse}',[BeneficeController::class,"delete"])->name("caisse.supprimer");
Route::get('edit/caisse/{id}',[BeneficeController::class,"edite"])->name('edite_caisse');
Route::put('/update/caisse/{id}',[BeneficeController::class,"update"])->name('update_caisse');
 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
