<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string("nom_user");
            $table->string("prenom_user");
            $table->string("nationnalite_user")->nullable();
            $table->string('email_user',254)->nullable();
            $table->string("num_piece_user")->nullable();
            $table->string('telephone_user',254)->nullable();
            $table->string("adresse_user")->nullable();
            $table->string("password_user")->nullable();
            $table->string("fonction_user")->nullable();
            $table->date("naissance_user")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
