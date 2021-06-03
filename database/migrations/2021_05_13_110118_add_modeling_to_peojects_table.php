<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-13 11:01:18
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 11:05:21
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\database\migrations\2021_05_13_110118_add_modeling_to_peojects_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModelingToPeojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('modeling')->nullable()->default(null)->comment('建模地址');
            $table->string('line_image')->nullable()->default(null)->comment('线路图地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['modeling','line_image']);
        });
    }
}
