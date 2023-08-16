<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Utilisateur;
class ClientController extends Controller
{
    public function creationclient () {
        $utilisateurs = Utilisateur::all();
        return view('creationclient',compact("utilisateurs"));
    }
 
    //cette methode permet d'afficher la liste des utilisateur
    public function listeclient () {
        $clients = Client::orderBy("created_at","desc")->get();
        return view('listeclient',compact("clients"));
    }
    
    public function enregistrer(Request $request){
        // $request->validate([
        //         "nom_user"=>"required",
        //         "prenom_user"=>"required",
        //         "nationnalite_user"=>"required"
        //     ]);

            Client::create($request->all());

        // Utilisateur::create([
        //     "nom_user"=>$request->nom_user,
        //     "prenom_user"=>$request->prenom_user,
        //     "age_user"=>$request->age_user

        // ]);
        return back()->with("success","Client ajouté avec succés");
    }

    //Cette methode permet de modifier un client
    public function edite ($id) {
        $client = Client::where('id',$id)->first();
        return view('edite_client',compact('client'));
    }

    public function update (Request $request,$id) {
        $client = client::where('id',$id)->update([
            'nom_client' =>$request->nom_client,
            'prenom_client' =>$request->prenom_client,
            'num_piece_client' =>$request->num_piece_client,
            'telephone_client' =>$request->telephone_client,
            'adresse_client' =>$request->adresse_client
        ]);

        //$montant_deposer = $request->montant_dep;
        //$ancien_solde = Client::where('id',$request->client_id)->first()->solde_client;
        //$solde_actuel = $ancien_solde - $montant_deposer;
        // dd($solde_actuel);
        //Client::where('id',$request->client_id)->update([
                              //                  'solde_client' => $solde_actuel
                               //             ]);

                                            
        $client = Client::where('id',$id)->first();
        $clients = Client::orderBy("created_at","desc")->with('utilisateur')->get();

        return view('listeclient',compact('client','clients'));
    }

    //Cette methode permet de supprimer un client
    public function delete (Client $client) {
        $nom_complet = $client->nom_client ." ". $client->prenom_client;
        $client->delete();
        return back()->with("successdelete","Client '$nom_complet' supprimé avec succés");
    }
    
}
