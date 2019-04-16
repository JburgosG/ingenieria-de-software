<?php

use App\Relationship;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        $types = array(
            array('name' => 'Madre'),
            array('name' => 'Padre'),
            array('name' => 'Tio'),
            array('name' => 'Primo'),
            array('name' => 'Abuelo')
        );

        Relationship::insert($types);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
