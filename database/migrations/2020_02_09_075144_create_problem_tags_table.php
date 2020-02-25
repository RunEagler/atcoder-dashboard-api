<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("problem_id");
            $table->unsignedBigInteger('tag_id');
            $table->foreign('problem_id')->references('id')->on('problems');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->timestamps();

            $table->unique(['problem_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_tags');
    }
}
