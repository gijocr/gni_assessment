<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('question_id');
            $table->string('session_id');
            $table->timestamps();

            $table->foreign('answer_id')
                ->references('id')
                ->on('answers')
                ->onDelete('CASCADE');

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('CASCADE');

            $table->foreign('session_id')
                ->references('id')
                ->on('sessions')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_questions');
    }
}
