<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCRMActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_r_m_actions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('date');
          $table->string('hour');
          $table->integer('responsible_id')->unsigned();
          $table->string('product');
          $table->string('status');
          $table->string('contact_date')->nullable();
          $table->string('contact_hour')->nullable();
          $table->text('description');
          $table->integer('c_r_m_id')->unsigned();
          $table->foreign('c_r_m_id')->references('id')->on('c_r_m_s');
          $table->foreign('responsible_id')->references('id')->on('users');
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
        Schema::dropIfExists('c_r_m_actions');
    }
}
