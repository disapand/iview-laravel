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
            $table->string('channel', 50)->default('频道名称')->comment('频道名称');
            $table->string('form', 50)->default('TVC')->comment('展现形式');
            $table->string('detail', 600)->default('频道介绍')->comment('频道介绍，特点描述');
            $table->string('area', 100)->default('覆盖地区')->comment('覆盖地区');
            $table->string('language', 50)->default('language')->comment('语言');
            $table->enum('category', ['综合','新闻','财经','体育','娱乐','时尚','科技','其他',
                '生活','文史','军事','旅游','八卦','音乐','电影','少儿','艺术','汽车','健康',])->default('其他')->comment('类别');
            $table->string('station', 50)->default('所属电视台')->comment('所属电视台');
            $table->string('minimum_buy', 50)->default('0')->comment('最小投放预算或最小投放周期');
            $table->enum('time', ['5','10','15','20','25','30','45','60','120'])->default('10')->comment('广告时长');
            $table->string('company', 100)->default('XX公司')->comment('媒体所属公司或集团名称');
            $table->string('contributor', 20)->default('负责人')->comment('资源上传负责人姓名');
            $table->string('price', 20)->default('0')->comment('价格区间（美金）');
            $table->string('country', 50)->default('中国')->comment('国家或地区');
            $table->string('program', 1000)->default('热门节目')->comment('热门节目');
            $table->string('requirements')->default('null')->comment('上刊要求，如：无法刊登的产品类型、需要提前多久预定等');
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
        Schema::dropIfExists('television_resources');
    }
}
