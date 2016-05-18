<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
            $table->String('title');
            $table->String('category');
            $table->Float('ratings');
            $table->text('body');
            $table->Integer('likes');
            $table->Integer('user_id');
            $table->Integer('dislikes');
            $table->string('idea_image1');
            $table->string('idea_image2');
            $table->string('idea_image3');
            $table->timestamps('published_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ideas');
    }
}
