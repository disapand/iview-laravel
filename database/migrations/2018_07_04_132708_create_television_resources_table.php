<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelevisionResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('television_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channel', 50)->default('频道名称')->nullable()->comment('频道名称');
            $table->string('form', 50)->default('TVC')->nullable()->comment('展现形式');
            $table->string('detail', 600)->default('频道介绍')->nullable()->comment('频道介绍，特点描述');
            $table->string('area', 100)->default('覆盖地区')->nullable()->comment('覆盖地区');
            $table->string('language', 50)->default('language')->nullable()->comment('语言');
            $table->enum('category', ['综合新闻','财经','体育','娱乐','时尚','科技','其他',
                '生活','文史','军事','旅游','八卦','音乐','电影','少儿','艺术','汽车','健康',])->nullable()->default('其他')->comment('类别');
            $table->string('station', 50)->nullable()->default('所属电视台')->comment('所属电视台');
            $table->string('minimum_buy', 50)->nullable()->default('0')->comment('最小投放预算或最小投放周期');
            $table->string('time', 3)->default('10')->nullable()->comment('广告时长');
            $table->string('company', 100)->default('XX公司')->nullable()->comment('媒体所属公司或集团名称');
            $table->string('contributor', 20)->default('负责人')->nullable()->comment('资源上传负责人姓名');
            $table->string('price', 20)->default('0')->nullable()->comment('价格区间（美金）');
            $table->string('country', 50)->default('中国')->nullable()->comment('国家或地区');
            $table->string('program', 1000)->default('热门节目')->nullable()->comment('热门节目');
            $table->string('requirements')->default('null')->nullable()->comment('上刊要求，如：无法刊登的产品类型、需要提前多久预定等');
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
        Schema::dropIfExists('television_resources');
    }
}
