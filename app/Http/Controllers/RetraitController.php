<?php

namespace App\Http\Controllers;
use App\Models\Depot;
use App\Models\Utilisateur;
use App\Models\Client;
use App\Models\Receveur;
use App\Models\Retrait;
use App\Models\Benefice;
use Illuminate\Http\Request;

class RetraitController extends Controller
{
    public function creationretrait () {

        $utilisateurs = Utilisateur::all();
        $clients = Client::all();
        $receveurs = Receveur::all();
        $depots = Depot::all();
        $benefices = Benefice::all();
        return view('creationretrait',compact("utilisateurs","clients","receveurs","depots","benefices"));
    }

    //cette fonction permet d'effectuer un paiement
    public function paiement (Request $request) {
        //Enregistrement du depot
        Retrait::create([
            'code_retrait' =>$request->code_dep,
            'montant_retrait' =>$request->montant_dep,
            'commission_retrait' =>$request->commission_dep,
            'taux_retrait' =>$request->taux_dep,
            'utilisateur_id' =>$request->utilisateur_id,
            'client_id' =>$request->client_id,
            'receveur_id' =>$request->receveur_id
        ]);

        // Calcul solde du client
        $montant_deposer = $request->montant_dep;
        $ancien_solde = Client::where('id',$request->client_id)->first()->solde_client;
        $solde_actuel = $ancien_solde - $montant_deposer;
        // dd($solde_actuel);
        Client::where('id',$request->client_id)->update([
                                                'solde_client' => $solde_actuel
                                            ]);
        
        //Calcul du montant total retiré du systeme
        $montant_retrait = $request->montant_dep;
        $ancien_montant_ret = Benefice::where('id',$request->benefice_id)->first()->total_ret_caisse;
        $actuel_montant_ret = $ancien_montant_ret + $montant_retrait;
        //dd($solde_actuel);
        Benefice::where('id',$request->benefice_id)->update([
                                                'total_ret_caisse' => $actuel_montant_ret
                                            ]);
        
        //Calcul du benefice total en fonction de l'argent retiré
        $benefice_retrait = $request->commission_dep;
        $ancien_benefice_ret = Benefice::where('id',$request->benefice_id)->first()->montant_benefice_retrait;
        $actuel_benefice_ret = $ancien_benefice_ret + $benefice_retrait;
        Benefice::where('id',$request->benefice_id)->update([
                                                'montant_benefice_retrait' => $actuel_benefice_ret
                                            ]);

        return redirect()->route('listeretrait');
    }

    //cette methode permet d'afficher la liste des tous les retraits
    public function listeretrait () {
        $retraits = Retrait::orderBy("created_at","desc")->with('client','receveur','utilisateur')->get();
        return view('listeretrait',compact("retraits"));
    }

    //Cette methode permet d'annuler un retrait
    public function annuler (Retrait $retrait) {
        //$nom_complet = $receveur->nom_receveur ." ". $receveur->prenom_receveur;
        //$receveur->delete();
        return 0;//back()->with("successdelete","Receveur '$nom_complet' supprimé avec succés");
    }

    public function afficeretrait($id)
    {
        $solde = Client::where('id',$id)->first()->solde_client;

        return view('afficeretrait',compact('solde'));
    }
}
