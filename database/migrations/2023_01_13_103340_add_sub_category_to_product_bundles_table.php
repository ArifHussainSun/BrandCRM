<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubCategoryToProductBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_bundles', function (Blueprint $table) {
            $table->bigInteger('sub_categories_id')->unsigned()->index()->nullable()->after('category_id');
            $table->foreign('sub_categories_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_bundles', function (Blueprint $table) {
            $table->bigInteger('sub_categories_id')->unsigned()->index()->nullable();
        });
    }
}
