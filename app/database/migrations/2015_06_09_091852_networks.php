<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Networks extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('networks', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', TRUE);
            $table->integer('companies_id')->unsigned();
            $table->string('site_url');
            $table->string('link_fb');
            $table->string('link_gp');
            $table->string('link_tw');
            $table->string('link_li');
            $table->string('link_yt');
            $table->string('link_is');
            
            $table->timestamps();

            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('networks');
    }

}
