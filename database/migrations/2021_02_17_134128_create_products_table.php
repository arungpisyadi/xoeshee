<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo')->nullable();
            $table->string('name')->unique();
            $table->json('names')->nullable();
            $table->string('sku', 100)->nullable();
            $table->string('number', 17)->nullable();
            $table->string('categorycode', 20)->nullable();
            $table->json('categories')->nullable();
            $table->boolean('licensed')->default(0);
            $table->boolean('bulk')->default(0);
            $table->json('tags')->nullable();
            $table->string('location', 3)->nullable();
            $table->json('description')->nullable();
            $table->double('share', 8, 2)->default(0.00);
            $table->string('share_type', 11)->nullable()->default('fixed');
            $table->unsignedBigInteger('user_id')->index('products_user_id_foreign');
            $table->unsignedInteger('brand_id')->nullable();
            $table->date('reviewed_at')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable()->index('products_reviewed_by_foreign');
            $table->timestamps();
            $table->string('slug', 100)->nullable();
            $table->string('status', 11)->nullable()->default('reviewed');
            $table->boolean('featured')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
