<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Utilisateur;
use App\Models\Client;
use App\Models\Receveur;
use App\Models\Benefice;
use Illuminate\Database\Eloquent\Model;

class Retrait extends Model
{
    use HasFactory;
    protected $fillable=[
        'code_retrait','montant_retrait','commission_retrait','taux_retrait','receveur_id','client_id','utilisateur_id','benefice_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function receveur()
    {
        return $this->belongsTo('App\Models\Receveur');
    }
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }
    public function benefice()
    {
        return $this->belongsTo('App\Models\Benefice');
    }
}
