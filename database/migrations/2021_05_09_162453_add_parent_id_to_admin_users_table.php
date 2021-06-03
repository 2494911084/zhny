<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 16:24:53
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 16:25:42
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\database\migrations\2021_05_09_162453_add_parent_id_to_admin_users_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable()->default(0)->comment('上级用户');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            //
        });
    }
}
