<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("problem_id");
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('programming_language_id');
            $table->foreign('problem_id')->references('id')->on('problems');
            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('programming_language_id')->references('id')->on('programming_languages');
            $table->text('code');
            $table->integer('code_length');
            $table->integer('execution_time');
            $table->integer('memory');
            $table->timestamp('proposal_datetime');
            $table->timestamps();

            $table->unique(['problem_id', 'player_id','programming_language_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
