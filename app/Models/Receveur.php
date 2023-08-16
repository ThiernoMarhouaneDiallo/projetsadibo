<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;

class Receveur extends Model
{
    use HasFactory;
    protected $fillable=['nom_receveur','prenom_receveur','nationnalite_receveur','num_piece_receveur','telephone_receveur','adresse_receveur','utilisateur_id'];
   
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }

}
