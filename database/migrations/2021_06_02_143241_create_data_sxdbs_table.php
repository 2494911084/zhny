<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSxdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('data_sxdbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id')->comment('设备');
            $table->string('cnt')->nullable()->default(null)->comment('链接状态');
            $table->string('a_u')->nullable()->default(null)->comment('A相电压');
            $table->string('b_u')->nullable()->default(null)->comment('B相电压');
            $table->string('c_u')->nullable()->default(null)->comment('C相电压');
            $table->string('ab_u')->nullable()->default(null)->comment('AB线电压');
            $table->string('bc_u')->nullable()->default(null)->comment('BC线电压');
            $table->string('ca_u')->nullable()->default(null)->comment('CA线电压');
            $table->string('a_l')->nullable()->default(null)->comment('A相电流');
            $table->string('b_l')->nullable()->default(null)->comment('B相电流');
            $table->string('c_l')->nullable()->default(null)->comment('C相电流');
            $table->string('a_p')->nullable()->default(null)->comment('A相有功功率');
            $table->string('b_p')->nullable()->default(null)->comment('B相有功功率');
            $table->string('c_p')->nullable()->default(null)->comment('C相有功功率');
            $table->string('all_p')->nullable()->default(null)->comment('总有功功率');
            $table->string('a_pn')->nullable()->default(null)->comment('A相无功功率');
            $table->string('b_pn')->nullable()->default(null)->comment('B相无功功率');
            $table->string('c_pn')->nullable()->default(null)->comment('C相无功功率');
            $table->string('all_pn')->nullable()->default(null)->comment('总无功功率');
            $table->string('a_q')->nullable()->default(null)->comment('A相功率因数');
            $table->string('b_q')->nullable()->default(null)->comment('B相功率因数');
            $table->string('c_q')->nullable()->default(null)->comment('C相功率因数');
            $table->string('all_q')->nullable()->default(null)->comment('总功率因素');
            $table->string('freq')->nullable()->default(null)->comment('电网频率');
            $table->string('eup_f')->nullable()->default(null)->comment('正向有功电能');
            $table->string('enp_f')->nullable()->default(null)->comment('反向有功电能');
            $table->string('ep_f')->nullable()->default(null)->comment('有功电能总和');
            $table->string('eup_b')->nullable()->default(null)->comment('感性无功电度');
            $table->string('enp_b')->nullable()->default(null)->comment('容性无功电度');
            $table->string('ep_b')->nullable()->default(null)->comment('无功电能总和');
            $table->string('u_unb')->nullable()->default(null)->comment('电压不平衡度');
            $table->string('i_unb')->nullable()->default(null)->comment('电流不平衡度');
            $table->string('ep_need')->nullable()->default(null)->comment('有功需量');
            $table->dateTime('date_time')->comment('上报时间');
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
        Schema::dropIfExists('data_sxdbs');
    }
}
