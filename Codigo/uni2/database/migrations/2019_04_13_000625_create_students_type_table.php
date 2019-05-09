<?php

use App\Student_Type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTypeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('students_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
        });

        $types = array(
            array(
                'name' => 'Pregrado', 
                'description' => 'Estudios superiores hasta el título de grado.'
            ),
            array(
                'name' => 'Posgrado', 
                'description' => 'Corresponde al ciclo de estudios de especialización'
            )
        );

        Student_Type::insert($types);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('students_types');
    }

}
