<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eps');
            $table->string('price')->nullable();
            $table->integer('payment_day')->nullable()->default(0);
            $table->integer('level_education_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('students_types');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('level_education_id')->references('id')->on('levels_educations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('students');
    }

}
