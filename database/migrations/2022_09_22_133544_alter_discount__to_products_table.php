<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDiscountToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sales_price');
            $table->dropColumn('regular_price');
            $table->string('discount_type')->nullable()->after('price');
            $table->float('discount')->nullable()->after('discount_type');
            $table->float('original_price')->nullable()->after('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('discount_type')->nullable();
            $table->float('discount')->nullable();
            $table->float('original_price')->nullable();
        });
    }
}
