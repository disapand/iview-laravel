<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 10)->default('全部')->comment('分类');
            $table->string('title', 150)->default('标题')->comment('标题');
            $table->text('content')->comment('案例内容');
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
        Schema::dropIfExists('case_resources');
    }
}
