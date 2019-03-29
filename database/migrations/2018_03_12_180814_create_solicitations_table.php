<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('protocol_number')->nullable();
            $table->string('closing_date')->nullable();
            $table->string('status')->default('Aberto');
            $table->string('subject');
            $table->string('solicitation_type');
            $table->string('occurrence_type');
            $table->string('priority');
            $table->string('category');
            $table->integer('responsible_department_id')->unsigned();
            $table->text('solicitation_description');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('responsible_id')->unsigned()->nullable();
            $table->foreign('responsible_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('responsible_department_id')->references('id')->on('departments')
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
        Schema::dropIfExists('solicitations');
    }
}
