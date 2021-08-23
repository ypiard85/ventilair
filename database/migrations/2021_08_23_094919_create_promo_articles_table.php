<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->unsignedInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('promos')->onDelete('cascade');
            $table->timestamps();

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
        Schema::dropIfExists('promo_articles');
    }
}
