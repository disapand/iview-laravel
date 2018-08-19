<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_resources', function (Blueprint $table) {
            $table->text('needs')->nullable()->comment('需求分析');
            $table->text('strategy')->nullable()->comment('推广策略');
            $table->text('execute')->nullable()->comment('方案执行');
            $table->text('effect')->nullable()->comment('推广效果');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_resources', function (Blueprint $table) {
            $table->dropColumn(['needs', 'strategy', 'execute', 'effect']);
        });
    }
}
