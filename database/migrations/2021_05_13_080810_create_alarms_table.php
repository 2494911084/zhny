<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-13 08:08:10
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 08:10:00
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\database\migrations\2021_05_13_080810_create_alarms_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id');
            $table->unsignedBigInteger('admin_user_id');
            $table->json('gz');
            $table->string('status')->comment('是否开启');
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
        Schema::dropIfExists('alarms');
    }
}
