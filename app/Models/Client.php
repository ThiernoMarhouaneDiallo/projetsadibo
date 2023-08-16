<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable=[
             'nom_client','prenom_client','nationnalite_client','num_piece_client','telephone_client','adresse_client','solde_client','utilisateur_id'
        ];

    public function depots()
    {
        return $this->hasMany('App\Models\Depot','clien_id');
    }
    public function retraits()
    {
        return $this->hasMany('App\Models\Retrait','clien_id');
    }
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }
}

