<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 07:25:32
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 15:36:40
 * @Description: 巡检计划
 * @FilePath: \laravel-admin\database\migrations\2021_05_09_072532_create_inspections_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('计划名称');
            $table->unsignedBigInteger('equipment_id')->comment('采集设备');
            $table->unsignedBigInteger('wechat_user_id')->comment('巡检人员');
            $table->unsignedBigInteger('admin_user_id')->comment('归属');
            $table->dateTime('ins_date')->comment('开始巡检时间');
            $table->dateTime('up_date')->comment('任务下发时间');
            $table->string('remarks')->nullable()->default(null)->comment('备注');
            $table->string('feedback')->nullable()->default(null)->comment('反馈');
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
        Schema::dropIfExists('inspections');
    }
}
