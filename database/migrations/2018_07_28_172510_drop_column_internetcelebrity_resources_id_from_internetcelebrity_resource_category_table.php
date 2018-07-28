<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnInternetcelebrityResourcesIdFromInternetcelebrityResourceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internetcelebrity_resource_categories', function (Blueprint $table) {
            $table->dropColumn('internetcelebrity_resources_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internetcelebrity_resource_categories', function (Blueprint $table) {
            $table->integer('internetcelebrity_resources_id')->nullable();
        });
    }
}
