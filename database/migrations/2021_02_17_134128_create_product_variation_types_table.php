<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variation_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->index('product_variation_types_product_id_foreign');
            $table->string('name');
            $table->longText('title')->nullable();
            $table->string('sku', 100)->nullable();
            $table->integer('stock');
            $table->double('price', 11, 2)->default(0.00);
            $table->double('member_price', 11, 2)->default(0.00);
            $table->double('discount_price', 11, 2)->default(0.00);
            $table->double('unit_price', 11, 2)->default(0.00);
            $table->double('purchase_price', 11, 2)->default(0.00);
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
        Schema::dropIfExists('product_variation_types');
    }
}
