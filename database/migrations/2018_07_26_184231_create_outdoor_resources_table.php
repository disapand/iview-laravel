<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutdoorResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outdoor_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city', 50)->default('城市名称')->nullable()->comment('城市');
            $table->string('form', 50)->default('静态')->nullable()->comment('形式');
            $table->string('unit_num', 50)->default('每组的数量，比如一组7个或一组60个等')->nullable()->comment('单位数量')->nullable();
            $table->string('language', 20)->default('中文')->nullable()->comment('语言');
            $table->string('category', 20)->default('机场')->nullable()->comment('类别');
            $table->string('property', 20)->default('机场')->nullable()->comment('类别属性');
            $table->string('SOV', 20)->default('1/4')->nullable()->comment('SOV');
            $table->integer('visitor')->default(0)->nullable()->comment('人流量');
            $table->integer('traffic')->default(0)->nullable()->comment('车流量');
            $table->integer('minimum_buy')->default(0)->nullable()->comment('最小采购周期或单位');
            $table->string('format', 100)->nullable()->default('文字+数字')->comment('规格尺寸');
            $table->string('number', 100)->nullable()->default('一个单位位置的广告面数，如：一个位置2面、4面等')->comment('广告载体面数');
            $table->string('time', 20)->default('小时')->nullable()->comment('广告刊出时间');
            $table->string('media_price', 20)->default('0')->nullable()->comment('媒体报价（美元）');
            $table->string('price', 20)->default('0')->nullable()->comment('执行价（美元）');
            $table->integer('total_num')->default(0)->nullable()->comment('媒体总数量');
            $table->string('company', 50)->default('媒体所属公司或集团名称')->nullable()->comment('媒体所属公司或集团');
            $table->string('contributor', 50)->default('资源上传负责人姓名')->nullable()->comment('媒介开发者');
            $table->string('detail')->default('【详细地址】')->nullable()->comment('媒体细节');
            $table->string('country', 50)->default('国家或地区')->nullable()->comment('国家或地区');
            $table->string('name', 150)->default('纽约时报广场-纳斯达克大屏')->nullable()->comment('名称');
            $table->string('requirements')->default('无法刊登的产品类型、需要提前多久预定等')->nullable()->comment('上刊要求');
            $table->boolean('isuse')->default(true)->nullable()->comment('是否有效');
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
        Schema::dropIfExists('outdoor_resources');
    }
}