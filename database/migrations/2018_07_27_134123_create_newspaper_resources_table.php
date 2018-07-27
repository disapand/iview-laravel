<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewspaperResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newspaper_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('知名媒体如New York Times请写纽约时报，无法翻译成中文的媒体写该语种媒体名称即可')->comment('媒体名称');
            $table->string('form', 20)->default('杂志')->comment('媒体形式');
            $table->string('ad_form', 20)->default('硬广')->comment('广告形式')->nullable();
            $table->string('detail')->default('媒体介绍，特点描述')->comment('内容和特点');
            $table->string('area', 50)->default('受众主要分布地区')->comment('覆盖区域');
            $table->string('language', 20)->default('中文')->comment('语言')->nullable();
            $table->string('category', 20)->default('综合')->comment('类别');
            $table->integer('minimum_buy')->default(0)->comment('最小采购周期或单位')->nullable();
            $table->string('format', 100)->default('文字+数字')->comment('规格尺寸');
            $table->string('cycle', 10)->default('天')->comment('发行周期');
            $table->string('media_price', 20)->default('0')->comment('媒体报价（美元）')->nullable();
            $table->string('price', 20)->default('0')->comment('执行价（美元）')->nullable();
            $table->integer('circulation')->default(0)->comment('纸媒发行量');
            $table->string('page', 50)->default('封面、封二、封底、FP、DPS、1/2P、1/4P')->comment('版面');
            $table->string('country', 50)->default('国家或地区')->comment('国家或地区');
            $table->string('version', 20)->default('彩色版、黑白版、平时版、周末版')->comment('版本');
            $table->string('company', 50)->default('媒体所属公司或集团名称')->comment('媒体所属公司或集团')->nullable();
            $table->string('contributor', 50)->default('资源上传负责人姓名')->comment('媒介开发者')->nullable();
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
        Schema::dropIfExists('newspaper_resources');
    }
}
