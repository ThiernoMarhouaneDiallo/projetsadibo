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
            $table->double("montant_dep");
            $table->double("commission_dep");
            $table->double("taux_dep");
            $table->foreignId("utilisateur_id")->constrained("utilisateurs");
            $table->foreignId("receveur_id")->constrained("receveurs");
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
            $table->dropConstrainedForeignId("receveur_id");
            $table->dropConstrainedForeignId("client_id");
            $table->dropConstrainedForeignId("benefice_id");
        });
        Schema::dropIfExists('depots');
    }
}
