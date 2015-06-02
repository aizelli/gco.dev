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
            $table->integer('subcategory_id');
            $table->integer('category2nd_id');
            $table->integer('subcategory2nd_id');
            $table->string('nome_emp', 120)->nullable();
            $table->string('razao_social', 120);
            $table->bigInteger('cnpj');
            $table->integer('ie')->nullable();
            $table->integer('cep');
            $table->string('endereco', 60);
            $table->integer('numero');
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 30);
            $table->mediumInteger('cidade');
            $table->tinyInteger('estado');
            $table->char('pais', 20);
            $table->string('nome_resp', 60);
            $table->bigInteger('celular')->nullable();
            $table->integer('telefone1');
            $table->integer('telefone2')->nullable();
            $table->string('email', 120);
            $table->text('descricao');
            $table->tinyInteger('tipo_contrato');
            $table->tinyInteger('dias_contrato');
            $table->decimal('valor_contrato', 8,2);
            $table->string('site_url')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('gp_url')->nullable();
            $table->string('tw_url')->nullable();
            $table->string('in_url')->nullable();
            $table->string('ne_url')->nullable();
            $table->string('cartao_img');
            $table->string('imgs')->nullable();
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
