<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefices', function (Blueprint $table) {
            $table->id();
            $table->string("nom_caisse");
            $table->string("adresse_caisse");
            $table->double("total_dep_caisse");
            $table->double("total_ret_caisse");
            $table->double("montant_benefice_retrait");
            $table->double("montant_benefice_depot");
            $table->double("montant_benefice_attente");
            $table->foreignId("utilisateur_id")->constrained("utilisateurs");
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
        Schema::table("benefices", function(Blueprint $table){
            $table->dropConstrainedForeignId("utilisateur_id");
        });

        Schema::dropIfExists('benefices');
    }
}
