<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;
    protected $fillable=['nom_partenaire','prenom_partenaire','nationnalite_partenaire','num_piece_partenaire','telephone_partenaire','adresse_partenaire','email_partenaire','fonction_partenaire','utilisateur_id'];

    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }
}

