<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_type_id');
            $table->unsignedBigInteger('question_type_id');
            $table->text('description');
            $table->integer('order');
            $table->timestamps();

            $table->foreign('page_type_id')
                ->references('id')
                ->on('page_types')
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
        Schema::dropIfExists('questions');
    }
}
