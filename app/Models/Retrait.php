<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Utilisateur;
use App\Models\Client;
use App\Models\User;
//use App\Models\Receveur;
use App\Models\Benefice;
use Illuminate\Database\Eloquent\Model;

class Retrait extends Model
{
    use HasFactory;
    protected $fillable=[
        'code_retrait','nom_rec_retrait','numero_rec_retrait','montant_retrait_yuan','montant_retrait','commission_retrait','taux_retrait','client_id','utilisateur_id','benefice_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function benefice()
    {
        return $this->belongsTo('App\Models\Benefice');
    }
}
