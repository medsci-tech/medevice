<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id')->unsigned()->comment('所属类别ID');
            $table->foreign('category_id')->references('id')->on('product_categories');

            $table->integer('supplier_id')->unsigned()->comment('所属供应商ID');
            $table->foreign('supplier_id')->references('id')->on('suppliers');

            $table->string('name');
            $table->string('remark');
            $table->text('introduction');
            $table->decimal('price');
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
        //
        Schema::drop('products');
    }
}
