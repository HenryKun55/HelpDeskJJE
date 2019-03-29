<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_mode');
            $table->string('status');
            $table->integer('responsible_id')->unsigned();
            $table->foreign('responsible_id')->references('id')->on('users');
            $table->text('description');
            $table->integer('solicitation_id')->unsigned();
            $table->foreign('solicitation_id')->references('id')->on('solicitations');
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
        Schema::dropIfExists('actions');
    }
}
