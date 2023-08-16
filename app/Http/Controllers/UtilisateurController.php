<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
class UtilisateurController extends Controller
{
    //cette methode affiche le formulaire de la creation des utilisateurs
    public function creationutilisateur () {  
        return view('creationutilisateur');
    }

    //cette methode permet d'afficher la liste des utilisateur
    public function listeutilisateur () {
        $utilisateurs = Utilisateur::orderBy("created_at","desc")->get();
        return view('listeutilisateur',compact("utilisateurs"));
    }

    //cette methode permet d'enregister les utilisateurs
    public function modifier(Request $request){
            Utilisateur::create($request->all());  
        return back()->with("success","Utilisateur modifié avec succés");
    }

    //cette methode permet de modifier les informations d'un utilisateur

    public function enregistrer(Request $request){
        Utilisateur::create($request->all());
  
    return back()->with("success","Utilisateur ajouté avec succés");
}

    //Cette methode permet de supprimer un utilisateur
    public function delete (Utilisateur $utilisateur) {
        $nom_complet = $utilisateur->nom_user ." ". $utilisateur->prenom_user;
        $utilisateur->delete();
        return back()->with("successdelete","L'utilisateur '$nom_complet' ajouté avec succés");
    }
    
}
