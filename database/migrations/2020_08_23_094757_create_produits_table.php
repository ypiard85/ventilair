<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');;
            $table->timestamps();
            $table->string('nom', 50);
            $table->text('description');
            $table->string('description_courte', '191');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->float('prix', '6', '2');
            $table->integer('stock');
            $table->float('note', '2', '1');
            $table->string('couleur', 10);
            $table->integer('taille');
            $table->float('poids');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('filtrepoids_id')->nullable();
            $table->foreign('filtrepoids_id')->references('id')->on('filtrepoids')->onDelete('set null');
            $table->unsignedBigInteger('filtre_tailles_id')->nullable();
            $table->foreign('filtre_tailles_id')->references('id')->on('filtretailles')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
