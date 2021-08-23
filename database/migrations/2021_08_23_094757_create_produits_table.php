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
            $table->id();
            $table->timestamps();
            $table->string('nom', 50);
            $table->text('description');
            $table->string('description_courte', '191');
            $table->unsignedInteger('categorie_id');
            $table->foreign('categorie_id')->id('id')->on('categories')->onDelete('cascade');
            $table->float('price', '6', '2');
            $table->integer('stock');
            $table->float('note', '2', '1');
            $table->string('couleur', 10);
            $table->float('poids');
            $table->unsignedInteger('type_id');
            $table->foreign('type_id')->id('id')->on('types')->onDelete('cascade');
            $table->unsignedInteger('filtres_poids_id');
            $table->foreign('filtre_poids_id')->id('id')->on('filtre_poids')->onDelete('cascade');
            $table->unsignedInteger('filtre_tailles_id');
            $table->foreign('filtre_tailles_id')->id('id')->on('filtre_tailles')->onDelete('cascade');

            $table->engine = 'InnoDB';

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
