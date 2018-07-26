<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutdoorResourceImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outdoor_resource_imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('outdoor_resources_id')->nullable()->comment('对应的户外资源');
            $table->string('url')->comment('图片的地址');
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
        Schema::dropIfExists('outdoor_resource_imgs');
    }
}
