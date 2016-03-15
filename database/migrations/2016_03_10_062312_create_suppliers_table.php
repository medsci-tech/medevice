<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned()->comment('��Ӧ������ID');
            $table->foreign('type_id')->references('id')->on('product_type');

            $table->string('openid')->comment('΢��openid');
            $table->unique('openid');
            $table->string('phone', 31)->nullable()->comment('��ϵ��ʽ');
            $table->unique('phone');
            $table->string('email', 31)->nullable()->comment('����');
            $table->unique('email');

            $table->boolean('is_approved')->default(0)->comment('�Ƿ�ͨ�����.');
            $table->string('suppliers_name')->nullable()->comment('��Ӧ������');
            $table->string('suppliers_desc')->nullable()->comment('��Ӧ������');
            $table->string('logo_image_url')->nullable()->comment('LogoͼƬ��ַ');

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
        Schema::drop('suppliers');
    }
}
