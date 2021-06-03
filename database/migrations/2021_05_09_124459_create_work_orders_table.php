<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 12:44:59
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 12:50:27
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\database\migrations\2021_05_09_124459_create_work_orders_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('num')->comment('工单编号');
            $table->unsignedBigInteger('equipment_id')->comment('维保设备');
            $table->string('status')->comment('工单状态1未开始2已下发3进行中4已完成');
            $table->string('work_order_type')->comment('工单类型');
            $table->unsignedBigInteger('admin_user_id')->comment('归属');
            $table->unsignedBigInteger('inspection_id')->comment('巡检id');
            $table->unsignedBigInteger('repair_id')->comment('报修id');
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
        Schema::dropIfExists('work_orders');
    }
}
