<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('case_resources_id')->nullable()->comment('所属的案例资源')->nullable();
            $table->string('url')->comment('图片、视频等对应的链接')->nullable();
            $table->string('category')->default('img')->comment('图片还是视频')->nullable();
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
        Schema::dropIfExists('case_imgs');
    }
}
