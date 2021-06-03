<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 17:54:32
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-08 23:15:56
 * @Description: 项目
 * @FilePath: \laravel-admin\database\migrations\2021_05_08_175432_create_projects_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_user_id')->comment('归属用户');
            $table->string('title')->comment('项目名称');
            $table->string('person')->comment('负责人');
            $table->string('tel')->comment('手机号');
            $table->date('start_date')->comment('开始时间');
            $table->text('intro')->nullable()->default(null)->comment('项目介绍');
            $table->string('latitude')->nullable()->default(null)->comment('latitude');
            $table->string('longitude')->nullable()->default(null)->comment('longitude');
            $table->unsignedInteger('province_id')->comment('省份');
            $table->unsignedInteger('city_id')->comment('市');
            $table->unsignedInteger('district_id')->comment('区');
            $table->string('image')->nullable()->default(null)->comment('项目图片');
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
        Schema::dropIfExists('projects');
    }
}
