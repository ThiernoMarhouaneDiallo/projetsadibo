<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UtilisateurController extends Controller
{
    //cette methode affiche le formulaire de la creation des utilisateurs
    public function creationutilisateur () {  
        $roles = Role::orderBy("created_at","desc")->get();
        return view('creationutilisateur',compact('roles'));
    }

    //cette methode permet d'afficher la liste des utilisateur
    public function listeutilisateur () {

        $utilisateurs = User::orderBy("created_at","desc")->get();
        return view('listeutilisateur',compact("utilisateurs"));
    }

    //cette methode permet d'enregister les utilisateurs
    public function modifier(Request $request){

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
 

        return back()->with("success","Utilisateur modifié avec succés");
    }

    //cette methode permet de modifier les informations d'un utilisateur

    public function enregistrer(Request $request){

        //$role = Role::create(['name' => 'Partenaire']);
        //dd($role);
        $new_compte = User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password)  
        ]);


        $new_compte->assignRole($request->role_assigne);

  
    return back();
}

    //Cette methode permet de supprimer un utilisateur
    public function delete (Utilisateur $utilisateur) {
        $nom_complet = $utilisateur->nom_user ." ". $utilisateur->prenom_user;
        $utilisateur->delete();
        return back()->with("successdelete","L'utilisateur '$nom_complet' ajouté avec succés");
    }
    
}
