<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_type_id');
            $table->string('name');
            $table->string('slug');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('button_label');
            $table->string('footer_label')->nullable();
            $table->integer('order');
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
        Schema::dropIfExists('pages');
    }
}
