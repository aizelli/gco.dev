<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', true);
            $table->string('nome');
            $table->string('email', 120)->unique();
            $table->string('usuario', 10)->unique();
            $table->string('password');
            $table->tinyInteger('nivel');
            $table->boolean('ativo');

            $table->rememberToken();
            $table->timestamps();
        });
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
