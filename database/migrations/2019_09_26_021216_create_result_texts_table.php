<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_texts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_type_id');
            $table->string('title');
            $table->text('description');
            $table->decimal('score_min');
            $table->decimal('score_max');
            $table->integer('order');
            $table->boolean('final');
            $table->timestamps();

            $table->foreign('page_type_id')
                ->references('id')
                ->on('page_types')
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
        Schema::dropIfExists('result_texts');
    }
}
