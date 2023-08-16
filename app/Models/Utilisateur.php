<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    //protected $fillable = ['nom_user'];
    protected $fillable=['nom_user','prenom_user','nationnalite_user','email_user','num_piece_user','telephone_user','adresse_user','password_user','fonction_user','naissance_user'];
}
