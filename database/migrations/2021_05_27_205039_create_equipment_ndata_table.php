<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentNdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // 光伏发电
        Schema::create('data_gffds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id')->comment('设备');
            $table->string('cnt')->nullable()->default(null)->comment('链接状态');
            $table->string('all_power')->nullable()->default(null)->comment('总发电量');
            $table->string('all_time')->nullable()->default(null)->comment('总发电时间');
            $table->string('pv1_u')->nullable()->default(null)->comment('第一路PV电压');
            $table->string('pv2_u')->nullable()->default(null)->comment('第二路PV电压');
            $table->string('pv1_l')->nullable()->default(null)->comment('第一路PV电流');
            $table->string('pv2_l')->nullable()->default(null)->comment('第二路PV电流');
            $table->string('r_u')->nullable()->default(null)->comment('A相电压');
            $table->string('s_u')->nullable()->default(null)->comment('B相电压');
            $table->string('t_u')->nullable()->default(null)->comment('C相电压');
            $table->string('r_l')->nullable()->default(null)->comment('A相电流');
            $table->string('s_l')->nullable()->default(null)->comment('B相电流');
            $table->string('t_l')->nullable()->default(null)->comment('C相电流');
            $table->string('r_f')->nullable()->default(null)->comment('A相频率');
            $table->string('s_f')->nullable()->default(null)->comment('B相频率');
            $table->string('t_f')->nullable()->default(null)->comment('C相频率');
            $table->string('all_p')->nullable()->default(null)->comment('输出功率');
            $table->string('run_state')->nullable()->default(null)->comment('运行状态');
            $table->dateTime('temp')->nullable()->default(null)->comment('机器内部温度');
            $table->dateTime('today_power')->nullable()->default(null)->comment('当日发电量');
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
        Schema::dropIfExists('data_dgffds');
    }
}
