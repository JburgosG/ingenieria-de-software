<?php

use App\Day;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });

        $days = array(
            array('name' => 'Lunes'),
            array('name' => 'Martes'),
            array('name' => 'Miercoles'),
            array('name' => 'Jueves'),
            array('name' => 'Viernes'),
            array('name' => 'Sabado'),
            array('name' => 'Domingo')
        );

        Day::insert($days);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
