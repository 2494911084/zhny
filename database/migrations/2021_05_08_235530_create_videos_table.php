<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 23:55:30
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 00:14:48
 * @Description: 视频
 * @FilePath: \laravel-admin\database\migrations\2021_05_08_235530_create_videos_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('video_name')->comment('视频名称');
            $table->string('video_url')->nullable()->default(null)->comment('播放地址');
            $table->string('video_type')->comment('视频类型1萤石云');
            $table->unsignedBigInteger('equipment_id')->comment('采集设备');
            $table->json('configure')->comment('配置信息');
            $table->unsignedBigInteger('admin_user_id')->comment('归属');
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
        Schema::dropIfExists('videos');
    }
}
