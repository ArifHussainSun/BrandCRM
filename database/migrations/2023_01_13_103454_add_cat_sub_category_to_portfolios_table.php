<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatSubCategoryToPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned()->index()->nullable()->after('popup');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->bigInteger('sub_categories_id')->unsigned()->index()->nullable();

        });
    }
}
