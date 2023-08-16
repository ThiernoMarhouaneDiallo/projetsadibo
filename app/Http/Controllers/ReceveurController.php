<?php

namespace App\Http\Controllers;
use App\Models\Receveur;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class ReceveurController extends Controller
{
    public function creationreceveur () {
        $utilisateurs = Utilisateur::all();
        return view('creationreceveur',compact("utilisateurs"));
    }
 
    //cette methode permet d'afficher la liste des receveur
    public function listereceveur () {
        $receveurs = Receveur::orderBy("created_at","desc")->get();
        return view('listereceveur',compact("receveurs"));
    }
    
    public function enregistrer(Request $request){
  

            Receveur::create($request->all());

        return back()->with("success","Receveur ajouté avec succés");
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
