<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depots', function (Blueprint $table) {
            $table->id();
            $table->string("code_dep");
            $table->string("nom_rec_dep");
            $table->string("numero_rec_dep");
            $table->string("statut");
            $table->double("montant_dep");
            $table->double("montant_dep_yuan");
            $table->double("commission_dep");
            $table->double("taux_dep");
            $table->foreignId("utilisateur_id")->constrained("users");
            $table->foreignId("client_id")->constrained("clients");
            $table->foreignId("benefice_id")->constrained("benefices");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("depots", function(Blueprint $table){
            $table->dropConstrainedForeignId("utilisateur_id");
            $table->dropConstrainedForeignId("client_id");
            $table->dropConstrainedForeignId("benefice_id");
        });
        Schema::dropIfExists('depots');
    }
}
