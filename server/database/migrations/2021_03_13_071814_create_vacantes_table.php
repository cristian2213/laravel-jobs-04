<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            // basic fields
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image')->nullable();
            $table->float('salary', 10, 2); // max= 8 digitos y decimales = 2
            $table->text('benefits')->nullable();
            $table->string('vacancies');
            $table->text('requirements');
            $table->text('functionalities');
            $table->dateTime('date');

            $table->enum('status', ['active', 'inactive']);


            // relationship field name
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('experience_id');

            // relationship table name
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('experience_id')->references('id')->on('experiences');
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
        Schema::dropIfExists('vacantes');
    }
}
