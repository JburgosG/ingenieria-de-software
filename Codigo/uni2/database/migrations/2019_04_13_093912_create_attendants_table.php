<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('identification')->nullable();

            $table->integer('student_id')->unsigned();
            $table->integer('relationship_id')->unsigned();
            $table->integer('identification_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('relationship_id')->references('id')->on('relationships');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('identification_type_id')->references('id')->on('identification_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendants');
    }
}
