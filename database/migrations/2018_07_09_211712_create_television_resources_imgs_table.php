<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelevisionResourcesImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('television_resources_imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('television_resources_id')->unsigned()->comment('电视资源的ID')->nullable();
            $table->string('url')->comment('图片的链接');
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
        Schema::dropIfExists('television_resources_imgs');
    }
}
