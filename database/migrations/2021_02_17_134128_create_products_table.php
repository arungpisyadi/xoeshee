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
            $table->string('code', 17)->nullable();
            $table->string('title', 100)->nullable();
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->longText('summary')->nullable();
            $table->string('type', 20)->default('simple')->nullable()->comment('simple, variations');
            $table->integer('stock', false)->default(0);
            $table->tinyInteger('status', false)->default(0)->nullable()->comment('0 = inactive, 1 = active');
            $table->boolean('featured')->default(0);
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
        Schema::dropIfExists('products');
    }
}
