<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suppliers')->insert([
            'supplier_name' => 'STERYLAB S.r.l'
        ]);

        DB::table('suppliers')->insert([
            'supplier_name' => '�۰´�����Ƽ��人���޹�˾',
            'supplier_desc' => '�۰´�����Ƽ��人���޹�˾�������人�������ǡ����й��人���������ҵ���ء�2011��11����ʽע���������˾��Ҫ���¸������＼����Ŀ���з�����ҵ����������������Bioda���߼��ϵͳ�Լ����׵�����Լ��߱��ˡ�������㣬���١�������ȫѪ��⡱�ȼ�ʱ����ϵͳ���ŵ㣬�ѻ��7�����ר���� ��˾�Ѿ���ù���ʳƷҩƷ�ල�����֣�SFDA���䷢�ġ�ҩƷ��������֤���͡�ҽ����е��������֤����֤��',
        ]);

        DB::table('suppliers')->insert([
            'supplier_name' => '�۰´�����Ƽ��人���޹�˾',
            'supplier_desc' => '�۰´�����Ƽ��人���޹�˾�������人�������ǡ����й��人���������ҵ���ء�2011��11����ʽע���������˾��Ҫ���¸������＼����Ŀ���з�����ҵ����������������Bioda���߼��ϵͳ�Լ����׵�����Լ��߱��ˡ�������㣬���١�������ȫѪ��⡱�ȼ�ʱ����ϵͳ���ŵ㣬�ѻ��7�����ר���� ��˾�Ѿ���ù���ʳƷҩƷ�ල�����֣�SFDA���䷢�ġ�ҩƷ��������֤���͡�ҽ����е��������֤����֤��',
        ]);
    }
}