<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        $path = 'profiles/default_user.jpg';
        Schema::create('users', function (Blueprint $table) use ($path) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->string('phone');
            $table->date('birthdate');
            $table->char('gender', 1);
            $table->string('identification');
            $table->string('photo')->default($path);
            $table->integer('group_id')->unsigned();
            $table->integer('identification_type_id')->unsigned();
            $table->integer('state_id')->default(1)->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('identification_type_id')->references('id')->on('identification_types');
        });

        $user = new User;
        $user->group_id = 1;
        $user->state_id = 1;
        $user->gender = 'm';
        $user->identification_type_id = '2';
        $user->address = 'Cra 58# 94a-14';
        $user->phone = '3193825611';
        $user->birthdate = '1995-05-15';
        $user->name = 'Jairo Burgos Guarin';
        $user->identification = '1020806410';
        $user->password = bcrypt(123456);
        $user->email = 'jyburgos87@ucatolica.edu.co';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
