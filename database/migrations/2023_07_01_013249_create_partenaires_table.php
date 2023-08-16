<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairesTable extends Migration
{
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id();
            $table->string("nom_partenaire");
            $table->string("prenom_partenaire");
            $table->string("nationnalite_partenaire");
            $table->string("num_piece_partenaire")->nullable();
            $table->string("telephone_partenaire");
            $table->string("adresse_partenaire")->nullable();
            $table->string("email_partenaire")->nullable();
            $table->string("fonction_partenaire")->nullable();
            $table->foreignId("utilisateur_id")->constrained("utilisateurs");
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::table("partenaires", function(Blueprint $table){
            $table->dropConstrainedForeignId("utilisateur_id");
        });
        Schema::dropIfExists('partenaires');
    }
}
