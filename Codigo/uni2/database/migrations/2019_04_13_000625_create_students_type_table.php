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
            array('name' => 'CIL', 'description' => 'Centro Internacional de Lideres'),
            array('name' => 'EFA', 'description' => 'Escuela de Formación Artistica'),
            array('name' => 'PE', 'description' => 'Puntos de Encuentro')
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
