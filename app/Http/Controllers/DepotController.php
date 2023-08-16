<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use App\Models\Utilisateur;
use App\Models\Client;
use App\Models\Receveur;
use App\Models\Benefice;
use Illuminate\Http\Request;


class DepotController extends Controller
{
    public function creationdepot () {

        $utilisateurs = Utilisateur::all();
        $clients = Client::all();
        $benefices = Benefice::all();
        $receveurs = Receveur::all();
        return view('creationdepot',compact("utilisateurs","clients","receveurs","benefices"));
    }
    
    public function enregistrer(Request $request){

         //dd($request->all());
        Depot::create($request->all());
        
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
        //dd($ancien_total_dep);
        $actuel_benefice_dep = $ancien_benefice_dep + $montant_commission_dep;
        Benefice::where('id',$request->benefice_id)->update([
                                                'montant_benefice_depot' => $actuel_benefice_dep
                                            ]);

        return redirect()->route('listedepot');
    }

    //cette methode permet d'afficher la liste des depots
    public function listedepot () {
        $depots = Depot::orderBy("created_at","desc")->with('client','receveur','utilisateur')->get();
        return view('listedepot',compact("depots"));
    }

    //Cette methode permet de modifier un depot
    public function edite ($id) {
        $depot = Depot::where('id',$id)->first();
        return view('edite_depot',compact('depot'));
    }

    public function update (Request $request,$id) {
        $depot = Depot::where('id',$id)->update([
            'code_dep' =>$request->code_dep,
            'montant_dep' =>$request->montant_dep,
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
        $depots = Depot::orderBy("created_at","desc")->with('client','receveur','utilisateur')->get();

        return view('listedepot',compact('depot','depots'));
    }

    //Cette methode permet de renvoyer le formulaire du paiement
    public function payer ($id) {
        $depot = Depot::where('id',$id)->first();
        return view('creationretrait',compact('depot'));
    }
    

    //Cette methode permet d'annuler un depot
    public function annuler (Depot $depot) {
        $nom_complet = $receveur->nom_receveur ." ". $receveur->prenom_receveur;
        $receveur->delete();
        return back()->with("successdelete","Receveur '$nom_complet' supprimé avec succés");
    }

    public function show($id)
    {
        // $solde = Client::where('id',$id)->first()->depots->sum('montant_dep');
        // dd($solde);
        $solde = Client::where('id',$id)->first()->solde_client;

        return view('show',compact('solde'));
    }
}
