<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('lastName', 50)->nullable();
            $table->date('birthday');
            $table->enum('genre', ['F','M','O'])->nullable();
            $table->string('cpf', 20);
            $table->string('rg', 50)->nullable();
            $table->string('zip_code', 10);
            $table->string('address', 100);
            $table->string('number', 20);
            $table->string('neighborhood', 50)->nullable();
            $table->string('complement', 100)->nullable();
            $table->string('state', 2)->index();
            $table->string('city', 50)->index();
            $table->string('phone', 15)->nullable();
            $table->string('cell_phone', 15)->nullable();
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
        Schema::dropIfExists('persons');
    }
}
