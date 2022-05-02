<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumn2ToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');//投稿id参照
            $table->unsignedBigInteger('user_id');//ユーザーid参照
            $table->foreign('post_id')->referensed('id')->on('posts')->onDelete('cascade');//投稿が削除されたときにコメントも削除
            $table->foreign('user_id')->referensed('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
}
