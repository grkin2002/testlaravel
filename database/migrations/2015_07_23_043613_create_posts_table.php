<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('board_id');
            $table->integer('user_id');
            $table->string('post_title');
            $table->text('content');
            $table->tinyInteger('status')->unsigned();
            $table->integer('view_amount')->default(0);
            $table->integer('agree_amount')->default(0);
            $table->integer('oppose_amount')->default(0);
            $table->integer('neutral_amount')->default(0);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('board_id')
                ->references('id')
                ->on('boards')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
