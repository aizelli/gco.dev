<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Companies extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('companies', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id', TRUE);
            $table->integer('categories_id')->unsigned();
            $table->integer('sub1_id');
            $table->integer('sub2_id')->nullable();
            $table->string('nome_emp', 120);
            $table->string('razao_social', 120)->nullable();
            $table->bigInteger('cpfcnpj');
            $table->integer('ie')->nullable();
            $table->boolean('insento');
            $table->integer('cep');
            $table->string('endereco', 60);
            $table->integer('numero');
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 30);
            $table->mediumInteger('cidade');
            $table->tinyInteger('estado');
            $table->char('pais', 20);
            $table->string('coordenadas', 30)->nullable();
            $table->string('nome_resp', 60);
            $table->bigInteger('celular')->nullable();
            $table->bigInteger('telefone1')->nullable();
            $table->bigInteger('telefone2')->nullable();
            $table->string('email', 120);
            $table->text('descricao');
            $table->string('site_url')->nullable();
            $table->tinyInteger('tipo');
            $table->boolean('ativo');

            $table->timestamps();

            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('companies');
    }

}
