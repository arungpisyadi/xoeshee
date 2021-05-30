<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('product_variation_type_id')->references('id')->on('product_variation_types')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign('carts_product_id_foreign');
            $table->dropForeign('carts_product_variation_type_id_foreign');
        });
    }
}
