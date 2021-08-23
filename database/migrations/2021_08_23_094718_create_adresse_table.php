<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdresseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresse', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->nullable();
            $table->string('rue', '50');
            $table->char('code_postal', '5');
            $table->string('ville', '50');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->boolean('default');
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
        Schema::dropIfExists('adresses');
    }
}
