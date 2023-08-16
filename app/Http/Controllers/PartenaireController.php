<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;
use App\Models\Utilisateur;
class PartenaireController extends Controller
{
    public function creationpartenaire () {
        $utilisateurs = Utilisateur::all();
        return view('creationpartenaire',compact("utilisateurs"));
    }
 
    //cette methode permet d'afficher la liste des partenaire
    public function listepartenaire () {
        $partenaires = Partenaire::orderBy("created_at","desc")->get();
        return view('listepartenaire',compact("partenaires"));
    }
    
    public function enregistrer(Request $request){
        // $request->validate([
        //         "nom_partenaire"=>"required",
        //         "prenom_partenaire"=>"required",
        //         "nationnalite_partenaire"=>"required"
        //     ]);

            Partenaire::create($request->all());

        // Partenaire::create([
        //     "nom_partenaire"=>$request->nom_partenaire,
        //     "prenom_partenaire"=>$request->prenom_partenaire,
        //     "age_partenaire"=>$request->age_partenaire

        // ]);
        return back()->with("success","Partenaire ajouté avec succés");
    }

    //Cette methode permet de modifier un client
    public function edite ($id) {
        $partenaire = Partenaire::where('id',$id)->first();
        return view('edite_partenaire',compact('partenaire'));
    }

    public function update (Request $request,$id) {
        $partenaire = Partenaire::where('id',$id)->update([
            'nom_partenaire' =>$request->nom_partenaire,
            'prenom_partenaire' =>$request->prenom_partenaire,
            'num_piece_partenaire' =>$request->num_piece_partenaire,
            'telephone_partenaire' =>$request->telephone_partenaire,
            'adresse_partenaire' =>$request->adresse_partenaire,
            'email_partenaire' =>$request->email_partenaire
        ]);

        //$montant_deposer = $request->montant_dep;
        //$ancien_solde = Client::where('id',$request->client_id)->first()->solde_client;
        //$solde_actuel = $ancien_solde - $montant_deposer;
        // dd($solde_actuel);
        //Client::where('id',$request->client_id)->update([
                              //                  'solde_client' => $solde_actuel
                               //             ]);

                                            
        $partenaire = Partenaire::where('id',$id)->first();
        $partenaires = Partenaire::orderBy("created_at","desc")->with('utilisateur')->get();

        return view('listepartenaire',compact('partenaire','partenaires'));
    }

    //Cette methode permet de supprimer un partenaire
    public function delete (Partenaire $partenaire) {
        $nom_complet = $partenaire->nom_partenaire ." ". $partenaire->prenom_partenaire;
        $partenaire->delete();
        return back()->with("successdelete","Partenaire '$nom_complet' supprimé avec succés");
    }
    
}

