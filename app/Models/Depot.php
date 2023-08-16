<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Utilisateur;
use App\Models\Client;
use App\Models\Receveur;
use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    use HasFactory;

    protected $fillable=[
        'code_dep','montant_dep','commission_dep','taux_dep','receveur_id','benefice_id','client_id','utilisateur_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function receveur()
    {
        return $this->belongsTo('App\Models\Receveur');
    }
    public function benefice()
    {
        return $this->belongsTo('App\Models\Benefice');
    }
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur');
    }

}
