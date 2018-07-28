<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameToInternetcelerbrityCategoryTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internetcelebrity_resource_categories', function (Blueprint $table) {
            $table->string('name', 10)->after('internetcelebrity_resources_id')->unique();
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
            $table->dropColumn('name');
        });
    }
}
