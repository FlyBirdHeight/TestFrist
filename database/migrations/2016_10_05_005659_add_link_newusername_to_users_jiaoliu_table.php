<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkNewusernameToUsersJiaoliuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_jiaoliu', function (Blueprint $table) {
            $table->string('link_newusername')->default('')->comment('//回帖人名字');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_jiaoliu', function (Blueprint $table) {
            $table->dropColumn('link_newusername');
        });
    }
}
