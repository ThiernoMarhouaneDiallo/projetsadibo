<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;
use App\Models\Benefice;
use Illuminate\Http\Request;

class BeneficeController extends Controller
{
    //Cette fonction affiche la page d'accueil
    public function accueil () {
        return view('accueil');
    }

    public function creationcaisse () {
        $utilisateurs = Utilisateur::all();
        return view('creationcaisse',compact("utilisateurs"));
    }
    
    public function enregistrer(Request $request){

            Benefice::create([
                'nom_caisse' =>$request->nom_caisse,
                'adresse_caisse' =>$request->adresse_caisse,
                'total_dep_caisse' =>$request->total_dep_caisse,
                'total_ret_caisse' =>$request->total_ret_caisse,
                'montant_benefice_retrait' =>$request->montant_benefice_retrait,
                'montant_benefice_depot' =>$request->montant_benefice_depot,
                'montant_benefice_attente' =>$request->montant_benefice_attente,
                'utilisateur_id' =>$request->user_id
            ]);

        return back()->with("success","Receveur ajouté avec succés");
    }

        //cette methode permet d'afficher la Caisse
        public function listecaisse () {
            $caisses = Benefice::orderBy("created_at","desc")->get();
            return view('listecaisse',compact("caisses"));
        }

    //Cette methode permet de modifier un receveur
    public function edite ($id) {
        $receveur = Receveur::where('id',$id)->first();
        return view('edite_receveur',compact('receveur'));
    }

    public function update (Request $request,$id) {
        $receveur = Receveur::where('id',$id)->update([
            'nom_receveur' =>$request->nom_receveur,
            'prenom_receveur' =>$request->prenom_receveur,
            'num_piece_receveur' =>$request->num_piece_receveur,
            'telephone_receveur' =>$request->telephone_receveur,
            'adresse_receveur' =>$request->adresse_receveur
        ]);

        //$montant_deposer = $request->montant_dep;
        //$ancien_solde = Client::where('id',$request->client_id)->first()->solde_client;
        //$solde_actuel = $ancien_solde - $montant_deposer;
        // dd($solde_actuel);
        //Client::where('id',$request->client_id)->update([
                              //                  'solde_client' => $solde_actuel
                               //             ]);

                                            
        $receveur = Receveur::where('id',$id)->first();
        $receveurs = Receveur::orderBy("created_at","desc")->with('utilisateur')->get();

        return view('listereceveur',compact('receveur','receveurs'));
    }

    //Cette methode permet de supprimer un receveur
    public function delete (Receveur $receveur) {
        $nom_complet = $receveur->nom_receveur ." ". $receveur->prenom_receveur;
        $receveur->delete();
        return back()->with("successdelete","Receveur '$nom_complet' supprimé avec succés");
    }
}
