<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use App\Models\Utilisateur;
use App\Models\Client;
//use App\Models\Receveur;
use App\Models\Benefice;
use App\Models\User;
use Illuminate\Http\Request;


class DepotController extends Controller
{
    public function creationdepot () {

        $utilisateurs = User::all();
        $clients = Client::all();
        $benefices = Benefice::all();
        //$receveurs = Receveur::all();
        return view('creationdepot',compact("utilisateurs","clients","benefices"));
    }
    
    public function enregistrer(Request $request){

        //dd($request->all());
        //Depot::create($request->all());

        $montant_dep_conver = $request->montant_dep;
        $taux_dep_conver = $request->taux_dep;
        $montant_final_yuan = $montant_dep_conver/$taux_dep_conver;

        Depot::create([
            'code_dep' =>$request->code_dep,
            'nom_rec_dep' =>$request->nom_rec_dep,
            'numero_rec_dep' =>$request->numero_rec_dep,
            'montant_dep' =>$request->montant_dep,
            'montant_dep_yuan' =>$montant_final_yuan,
            'commission_dep' =>$request->commission_dep,
            'taux_dep' =>$request->taux_dep,
            'utilisateur_id' =>$request->utilisateur_id,
            'client_id' =>$request->client_id,
            'benefice_id' =>$request->benefice_id,
            'statut' =>'Non Payé'
        ]);

        
        $montant_deposer = $request->montant_dep;
        $ancien_solde = Client::where('id',$request->client_id)->first()->solde_client;
        $solde_actuel = $montant_deposer + $ancien_solde;
        // dd($solde_actuel);
        Client::where('id',$request->client_id)->update([
                                                'solde_client' => $solde_actuel
                                            ]);
        

        $ancien_total_dep = Benefice::where('id',$request->benefice_id)->first()->total_dep_caisse;
        //dd($ancien_total_dep);
        $actuel_total_dep = $ancien_total_dep + $montant_deposer;
        Benefice::where('id',$request->benefice_id)->update([
                                                'total_dep_caisse' => $actuel_total_dep
                                            ]);
        $montant_commission_dep = $request->commission_dep;
        $ancien_benefice_dep = Benefice::where('id',$request->benefice_id)->first()->montant_benefice_depot;
        $ancien_benefice_retrait = Benefice::where('id',$request->benefice_id)->first()->montant_benefice_retrait;
        $actuel_benefice_dep = $ancien_benefice_dep + $montant_commission_dep;
        $actuel_benefice_attente = $actuel_benefice_dep - $ancien_benefice_retrait;

        Benefice::where('id',$request->benefice_id)->update([
                                                'montant_benefice_depot' => $actuel_benefice_dep
                                            ]);
        Benefice::where('id',$request->benefice_id)->update([
                                                'montant_benefice_attente' => $actuel_benefice_attente
                                            ]);


        return redirect()->route('listedepot',compact("montant_final_yuan"));
    }

    //cette methode permet d'afficher la liste des depots
    public function listedepot () {
        $depots = Depot::orderBy("created_at","desc")->with('client','utilisateur')->get();
        return view('listedepot',compact("depots"));
    }

    //Cette methode permet de modifier un depot
    public function edite ($id) {
        $depot = Depot::where('id',$id)->first();
        return view('edite_depot',compact('depot'));
    }

    public function update (Request $request,$id) {
        $montant_dep_conver = $request->montant_dep;
        $taux_dep_conver = $request->taux_dep;
        $montant_final_yuan = $montant_dep_conver/$taux_dep_conver;

        $depot = Depot::where('id',$id)->update([
            'code_dep' =>$request->code_dep,
            'nom_rec_dep' =>$request->nom_rec_dep,
            'numero_rec_dep' =>$request->numero_rec_dep,
            'montant_dep' =>$request->montant_dep,
            'montant_dep_yuan' =>$montant_final_yuan,
            'commission_dep' =>$request->commission_dep,
            'taux_dep' =>$request->taux_dep,
        ]);

        $montant_deposer = $request->montant_dep;
        $ancien_solde = Client::where('id',$request->client_id)->first()->solde_client;
        $solde_actuel = $ancien_solde - $montant_deposer;
        
        Client::where('id',$request->client_id)->update([
                                               'solde_client' => $solde_actuel
                                           ]);

                                            
        $depot = Depot::where('id',$id)->first();
        $depots = Depot::orderBy("created_at","desc")->with('client','utilisateur')->get();

        return view('listedepot',compact('depot','depots'));
    }

    //Cette methode permet de renvoyer le formulaire du paiement
    public function payer ($id) {
        $depot = Depot::where('id',$id)->first();
        return view('creationretrait',compact('depot'));
    }

    public function show($id)
    {
        // $solde = Client::where('id',$id)->first()->depots->sum('montant_dep');
        // dd($solde);
        $solde = Client::where('id',$id)->first()->solde_client;

        return view('show',compact('solde'));
    }
}
