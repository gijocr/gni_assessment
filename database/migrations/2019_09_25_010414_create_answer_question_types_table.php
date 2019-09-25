<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_question_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('question_type_id');
            $table->integer('factor');
            $table->integer('score');
            $table->timestamps();

            $table->foreign('answer_id')
                ->references('id')
                ->on('answers')
                ->onDelete('CASCADE');

            $table->foreign('question_type_id')
                ->references('id')
                ->on('question_types')
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
        Schema::dropIfExists('answer_question_types');
    }
}
