<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->default('媒体名称')->comment('媒体名称')->nullable();
            $table->string('category', 20)->default('网站')->comment('类别')->nullable();
            $table->string('form', 20)->default('横幅广告')->comment('形式')->nullable();
            $table->string('detail')->default('媒体介绍，特点、优势等文字描述')->comment('内容和特点')->nullable();
            $table->string('area', 50)->default('受众主要分布地区')->comment('覆盖区域')->nullable();
            $table->string('language', 20)->default('中文')->comment('语言')->nullable();
            $table->string('platform', 20)->default('综合')->comment('媒体内容属性类别')->nullable();
            $table->string('company', 50)->default('媒体所属公司或集团名称')->comment('媒体所属公司或集团')->nullable();
            $table->integer('pv')->default(0)->comment('网站月度PV')->nullable();
            $table->integer('uv')->default(0)->comment('网站月度UV')->nullable();
            $table->integer('minimum_buy')->default(0)->comment('最小投放预算或最小投放周期')->nullable();
            $table->string('format', 100)->default('72px(W)×300px(H)')->comment('尺寸')->nullable();
            $table->string('media_price', 20)->default('0')->comment('媒体报价（美元）')->nullable();
            $table->string('price', 20)->default('0')->comment('执行价（美元）')->nullable();
            $table->string('contributor', 50)->default('资源上传负责人姓名')->comment('媒介开发者')->nullable();
            $table->string('link')->default('网站链接')->comment('网站链接')->nullable();
            $table->string('country', 50)->default('国家或地区')->comment('国家或地区')->nullable();
            $table->string('requirements')->default('无法刊登的产品类型、需要提前多久预定等')->comment('上刊要求')->nullable();
            $table->boolean('isuse')->default(true)->comment('是否有效')->nullable();
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
        Schema::dropIfExists('online_resources');
    }
}
