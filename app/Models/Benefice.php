<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;

class Benefice extends Model
{
    use HasFactory;
    protected $fillable=['nom_caisse','adresse_caisse','total_dep_caisse','total_ret_caisse','montant_benefice_retrait','montant_benefice_depot','montant_benefice_attente','utilisateur_id'];
   
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }
}
