<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgeBaseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_base_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename');
            $table->integer('knowledge_base_id')->unsigned();
            $table->foreign('knowledge_base_id')->references('id')->on('knowledge_bases');
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
        Schema::dropIfExists('knowledge_base_files');
    }
}
