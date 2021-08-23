<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_article', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produit')->onDelete('cascade');
            $table->unsignedInteger('promo_id');
            $table->foreign('promo_id')->references('id')->on('promo')->onDelete('cascade');
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
