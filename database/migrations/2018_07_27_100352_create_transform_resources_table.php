<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransformResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transform_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city', 50)->default('城市名称')->comment('城市');
            $table->string('form', 50)->default('静态')->comment('形式');
            $table->string('unit_num', 50)->default('每组的数量，比如一组7个或一组60个等')->comment('单位数量')->nullable();
            $table->string('position', 50)->default('整车喷绘、车体两侧、车头、车尾、车门、车厢内等等')->comment('媒体具体位置');
            $table->string('language', 20)->default('中文')->comment('语言')->nullable();
            $table->string('category', 20)->default('飞机')->comment('类别');
            $table->string('area', 50)->default('媒体所在交通工具的线路或区域')->comment('覆盖区域');
            $table->string('SOV', 20)->default('1/4')->comment('SOV');
            $table->integer('visitor')->default(0)->comment('人流量')->nullable();
            $table->integer('traffic')->default(0)->comment('车流量')->nullable();
            $table->integer('minimum_buy')->default(0)->comment('最小采购周期或单位')->nullable();
            $table->string('format', 100)->default('文字+数字')->comment('规格尺寸');
            $table->string('number', 100)->default('一个单位位置的广告面数，如：一个位置2面、4面等')->comment('广告载体面数');
            $table->string('time', 20)->default('小时')->comment('广告刊出时间')->nullable();
            $table->string('media_price', 20)->default('0')->comment('媒体报价（美元）')->nullable();
            $table->string('price', 20)->default('0')->comment('执行价（美元）')->nullable();
            $table->integer('total_num')->default(0)->comment('媒体总数量')->nullable();
            $table->string('company', 50)->default('媒体所属公司或集团名称')->comment('媒体所属公司或集团')->nullable();
            $table->string('contributor', 50)->default('资源上传负责人姓名')->comment('媒介开发者')->nullable();
            $table->string('detail')->default('【详细地址】')->comment('媒体细节')->nullable();
            $table->string('country', 50)->default('国家或地区')->comment('国家或地区');
            $table->string('name', 150)->default('纽约时报广场-纳斯达克大屏')->comment('名称');
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
        Schema::dropIfExists('transform_resources');
    }
}
