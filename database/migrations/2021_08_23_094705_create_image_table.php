<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->id();
            $table->engine = 'InnoDB';
            $table->timestamps();
<<<<<<< HEAD:database/migrations/2021_08_23_094705_create_images_table.php
            $table->string('name', 100);
            $table->unsignedInteger('product_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            
=======
            $table->string('name', '100');
            $table->unsignedInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produit')->onDelete('cascade');

            $table->engine = 'InnoDB';

>>>>>>> yoann:database/migrations/2021_08_23_094705_create_image_table.php
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
