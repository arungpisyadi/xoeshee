<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->nullable();
            $table->tinyInteger('featured')->default(0);
            $table->double('commission', 8, 2)->default(0.00);
            $table->string('type')->unique();
            $table->string('banner', 100)->nullable();
            $table->unsignedInteger('parent_id')->nullable()->index('categories_parent_id_foreign');
            $table->timestamps();
            $table->bigInteger('author')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
