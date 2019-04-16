<?php

use App\Identification_type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identification_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        $types = array(
            array('name' => 'Tarjeta de Identidad'),
            array('name' => 'Cédula de Ciudadania'),
            array('name' => 'Pasaporte'),
            array('name' => 'Nit')
        );

        Identification_type::insert($types);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identification_types');
    }
}
