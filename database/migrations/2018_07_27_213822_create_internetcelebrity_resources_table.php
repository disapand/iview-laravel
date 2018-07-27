<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternetcelebrityResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internetcelebrity_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('网名（本名），如不知道本名仅写网名即可，网名和本名相同写一个即可')->comment('KOL名称');
            $table->string('platform', 20)->default('Facebook')->comment('媒体内容属性类别');
            $table->string('ad_form', 20)->default('POST')->comment('广告形式')->nullable();
            $table->string('detail')->default('KOL简介，特点，优势等文字描述')->comment('KOL特点')->nullable();
            $table->string('area', 50)->default('受众主要分布地区')->comment('覆盖区域');
            $table->string('language', 20)->default('中文')->comment('语言')->nullable();
            $table->integer('fans')->default(0)->comment('粉丝数量最多的平台的粉丝量');
            $table->string('media_price', 20)->default('0')->comment('媒体报价（美元）')->nullable();
            $table->string('price', 20)->default('0')->comment('执行价（美元）')->nullable();
            $table->string('company', 50)->default('媒体所属公司或集团名称')->comment('KOL所属公司或集团')->nullable();
            $table->string('contributor', 50)->default('资源上传负责人姓名')->comment('媒介开发者')->nullable();
            $table->string('advantage')->default('测评文字、视频、搭配、街拍等')->comment('擅长的推广方式')->nullable();
            $table->string('country', 50)->default('国家或地区')->comment('国家或地区');
            $table->string('cooperation')->default('合作过的品牌举例')->comment('合作品牌');
            $table->string('requirements')->default('无法刊登的产品类型、需要提前多久预定等')->comment('上刊要求')->nullable();
            $table->boolean('isuse')->default(true)->comment('是否有效');
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
        Schema::dropIfExists('internetcelebrity_resources');
    }
}
