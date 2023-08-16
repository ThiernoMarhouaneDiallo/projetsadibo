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
            $table->double("montant_retrait");
            $table->double("commission_retrait");
            $table->double("taux_retrait");
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
        Schema::table("retraits", function(Blueprint $table){
            $table->dropConstrainedForeignId("utilisateur_id");
            $table->dropConstrainedForeignId("receveur_id");
            $table->dropConstrainedForeignId("client_id");
            $table->dropConstrainedForeignId("benefice_id");
        });
        Schema::dropIfExists('retraits');
    }
}
