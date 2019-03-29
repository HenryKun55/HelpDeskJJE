<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmitentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emitentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('nome_fantasia')->nullable();
            $table->string('cpf_cnpj');
            $table->string('insc_estadual')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->integer('crt_id')->unsigned();
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('municipio');
            $table->string('complemento')->nullable();
            $table->string('uf');
            $table->string('cod_municipio');
            $table->string('cod_uf');
            $table->foreign('crt_id')->references('id')->on('c_r_t_s')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emitentes');
    }
}
