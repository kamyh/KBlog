<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCommentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id_from')->unsigned();
            $table->integer('comment_id_sub')->unsigned();
            $table->timestamps();
        });

        Schema::table('sub_comments', function ($table) {
            $table->foreign('comment_id_from')
                ->references('id')->on('comments')
                ->onDelete('cascade');
        });

        Schema::table('sub_comments', function ($table) {
            $table->foreign('comment_id_sub')
                ->references('id')->on('comments')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_comments');
    }

}
