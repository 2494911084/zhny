<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 01:15:04
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 01:18:40
 * @Description: 设备报修
 * @FilePath: \laravel-admin\database\migrations\2021_05_09_011504_create_repairs_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_user_id')->comment('归属');
            $table->unsignedBigInteger('equipment_id')->comment('采集设备');
            $table->unsignedBigInteger('wechat_user_id')->comment('推送人员');
            $table->string('person')->comment('报修人');
            $table->string('tel')->comment('联系电话');
            $table->string('reason')->comment('报修原因');
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
        Schema::dropIfExists('repairs');
    }
}
