<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_en', 11)->comment('��Ӧ������-Ӣ');
            $table->string('type_ch', 11)->comment('��Ӧ������-��');
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
        Schema::drop('supplier_types');
    }
}
