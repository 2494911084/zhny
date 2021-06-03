<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-12 22:59:53
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-12 23:00:25
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\database\migrations\2021_05_12_225953_create_admin_configs_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_configs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_user_id');
            $table->json('ext');
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
        Schema::dropIfExists('admin_configs');
    }
}
