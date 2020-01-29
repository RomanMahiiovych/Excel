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
            $table->string('rubric');
            $table->string('small_rubric');
            $table->string('category_of_product');
            $table->string('producer');
            $table->string('name_of_product');
            $table->string('model_code');
            $table->text('product_description');
            $table->string('retail_price');
            $table->string('guarantee');
            $table->string('availability');
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
