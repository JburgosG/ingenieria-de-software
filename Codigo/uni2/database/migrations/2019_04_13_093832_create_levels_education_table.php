<?php

use App\Levels_education;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        $levels_education = array(
            array('name' => 'Primaria'),
            array('name' => 'Secundaria y bachillerato'),
            array('name' => 'Técnico'),
            array('name' => 'Tecnólogo'),
            array('name' => 'Pregrado'),
            array('name' => 'Postgrado'),
            array('name' => 'Maestría'),
            array('name' => 'Doctorado'),
        );

        Levels_education::insert($levels_education);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels_educations');
    }
}
