<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-13 08:26:41
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 08:28:35
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\database\migrations\2021_05_13_082641_create_alarm_datas_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlarmDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarm_datas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id');
            $table->string('alarm_content');
            $table->dateTime('alarm_time');
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
        Schema::dropIfExists('alarm_datas');
    }
}
