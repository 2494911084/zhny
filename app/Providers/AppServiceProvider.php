<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 06:41:23
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-09 15:34:58
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\app\Providers\AppServiceProvider.php
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Observers\RepairObserver;
use App\Models\Repair;
use App\Observers\InspectionObserver;
use App\Models\Inspection;
use App\Observers\EquipmentObserver;
use App\Models\Equipment;
use App\Observers\VideoObserver;
use App\Models\Video;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
        Repair::observe(RepairObserver::class);
        Inspection::observe(InspectionObserver::class);
        Video::observe(VideoObserver::class);
    }
}
