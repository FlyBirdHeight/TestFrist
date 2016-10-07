<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_jiaoliu', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('link_id');
            $table->integer('art_id')->default(0)->comment('//帖子id');
            $table->string('link_newuser')->default('')->comment('//回帖用户');
            $table->string('link_olduser')->default('')->comment('//帖子原用户');
            $table->string('link_content')->default('')->comment('//回帖内容');
            $table->string('link_time')->default('')->comment('//回帖时间');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_jiaoliu');
    }
}
