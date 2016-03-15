<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageVerifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('message_verifies', function (Blueprint $table) {
            $table->increments('id')->comment('����.');

            //������Ϣ
            $table->string('phone', 31)->comment('�ֻ�����.');
            $table->string('code', 31)->comment('��֤��.');
            $table->tinyInteger('status')->default(0)->comment('��֤��״̬��1��ʾ�Ѿ���ʹ�ù�.');
            $table->timestamp('expired')->nullable()->comment('��֤�����ʱ��.');

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
        Schema::drop('message_verifies');
    }
}
