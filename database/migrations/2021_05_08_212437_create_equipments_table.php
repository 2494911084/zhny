<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 21:24:37
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-08 21:55:05
 * @Description: 采集设备
 * @FilePath: \laravel-admin\database\migrations\2021_05_08_212437_create_equipments_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->comment('项目');
            $table->unsignedBigInteger('admin_user_id')->comment('归属');
            $table->unsignedBigInteger('equipment_type')->comment('设备种类');
            $table->string('mac')->comment('mac');
            $table->string('name')->comment('设备名称');
            $table->string('sn')->comment('从机id');
            $table->string('status')->comment('状态');
            $table->string('beilv')->nullable()->default(null)->comment('倍率');
            $table->string('work_date')->nullable()->defuault(null)->comment('投运时间');
            $table->string('uppl')->nullable()->default(null)->comment('上传频率');
            $table->string('is_liand')->comment('是否联动');
            $table->string('remarks')->nullable()->defuault(null)->comment('备注');
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
        Schema::dropIfExists('equipments');
    }
}
