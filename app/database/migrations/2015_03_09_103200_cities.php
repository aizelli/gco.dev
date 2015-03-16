<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cities extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cities', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', TRUE);
            $table->integer('states_id')->unsigned();
            $table->char('sigla', 2);
            $table->string('nome', 50);

            $table->timestamps();
            
            $table->foreign('states_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cities');
    }

}
