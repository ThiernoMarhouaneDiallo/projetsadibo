<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceveursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receveurs', function (Blueprint $table) {
            $table->id();
            $table->string("nom_receveur");
            $table->string("prenom_receveur");
            $table->string("nationnalite_receveur");
            $table->string("num_piece_receveur")->nullable();
            $table->string("telephone_receveur");
            $table->string("adresse_receveur")->nullable();
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
        Schema::table("receveurs", function(Blueprint $table){
            $table->dropConstrainedForeignId("utilisateur_id");
        });
        Schema::dropIfExists('receveurs');
    }
}
