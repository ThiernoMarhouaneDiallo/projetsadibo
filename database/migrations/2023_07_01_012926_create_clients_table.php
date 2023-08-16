<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("nom_client");
            $table->string("prenom_client");
            $table->string("nationnalite_client");
            $table->string("num_piece_client")->nullable();
            $table->string("telephone_client");
            $table->string("adresse_client")->nullable();
            $table->double("solde_client")->nullable();
            $table->foreignId("utilisateur_id")->constrained("utilisateurs");
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::table("clients", function(Blueprint $table){
            $table->dropConstrainedForeignId("utilisateur_id");
        });
        Schema::dropIfExists('clients');
    }
}
