<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVideoUrlTypeToVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('video_url_hls')->nullable()->defualt(null);
            $table->string('video_url_rtmp')->nullable()->defualt(null);
            $table->string('video_url_flv')->nullable()->defualt(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn(['video_url_hls','video_url_rtmp','video_url_flv']);
        });
    }
}
