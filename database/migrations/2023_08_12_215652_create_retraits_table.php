<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retraits', function (Blueprint $table) {
            $table->id();
            $table->string("code_retrait");
            $table->string("nom_rec_retrait");
            $table->string("numero_rec_retrait");
            $table->double("montant_retrait");
            $table->double("commission_retrait");
            $table->double("taux_retrait");
            $table->double("montant_retrait_yuan");
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
        Schema::table("retraits", function(Blueprint $table){
            $table->dropConstrainedForeignId("utilisateur_id");
            $table->dropConstrainedForeignId("client_id");
            $table->dropConstrainedForeignId("benefice_id");
        });
        Schema::dropIfExists('retraits');
    }
}
