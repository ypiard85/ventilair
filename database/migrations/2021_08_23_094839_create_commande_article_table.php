<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_article', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produit')->onDelete('cascade');
            $table->unsignedInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('commande')->onDelete('cascade');
            $table->integer('quantite');

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
        Schema::dropIfExists('commandes_articles');
    }
}
