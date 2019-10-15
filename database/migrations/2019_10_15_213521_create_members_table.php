<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 50)->nullable()->comment('邮箱');
            $table->string('phone', 11)->nullable()->comment('电话');
            $table->string('name', 20)->nullable()->comment('姓名');
            $table->string('password', 255)->nullable()->comment('密码');
            $table->string('sex', 2)->nullable()->comment('性别');
            $table->string('address', 255)->nullable()->comment('住址');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
