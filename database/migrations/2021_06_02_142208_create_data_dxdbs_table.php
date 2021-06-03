<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDxdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_dxdbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id')->comment('设备');
            $table->string('cnt')->nullable()->default(null)->comment('链接状态');
            $table->string('a_u')->nullable()->default(null)->comment('电压');
            $table->string('a_l')->nullable()->default(null)->comment('电流');
            $table->string('pf')->nullable()->default(null)->comment('总功功率');
            $table->string('freq')->nullable()->default(null)->comment('电网频率');
            $table->string('ep')->nullable()->default(null)->comment('总电能');
            $table->dateTime('date_time')->comment('上报时间');
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
        Schema::dropIfExists('data_dxdbs');
    }
}
