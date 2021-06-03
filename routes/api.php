<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 06:42:03
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-14 10:17:23
 * @Description: API
 * @FilePath: \laravel-admin\routes\api.php
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WorkPlaceController;
use App\Http\Controllers\Api\EquipmentDatasContoller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('emq')->name('api.emq.')->group(function() {
    // 设备数据转发
    Route::post('/equipment_data', [EquipmentDatasContoller::class, 'equipment_data']);

    Route::post('/client_connected', [EquipmentDatasContoller::class, 'client_connected']);
    Route::post('/client_disconnected', [EquipmentDatasContoller::class, 'client_disconnected']);
});
Route::prefix('v1')
    ->name('api.v1.')
    ->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::middleware(['auth:api','cors'])
            ->group(function () {
                Route::post('logout', [AuthController::class, 'logout']);
                Route::post('me', [AuthController::class, 'me']);
                // 新api
                //查询项目
                Route::get('workplace/get_projects', [WorkPlaceController::class, 'get_projects']);
                //根据项目id查询设备
                Route::get('workplace/get_equipments/{id}', [WorkPlaceController::class, 'get_equipments']);
                //根据设备id查询视频
                Route::get('workplace/get_video/{id}', [WorkPlaceController::class, 'get_video']);
                //根据设备id获取设备信息，与最新一条实时数据
                Route::get('workplace/getEquipmentData/{id}',[WorkPlaceController::class, 'getEquipmentData']);
                //动态监测 参数设备id 返回图表分项，图表时间数组，图表数据数组
                Route::get('workplace/get_equipment_data/{id}',[WorkPlaceController::class, 'get_equipment_data']);
                //查询单个设备信息
                Route::get('workplace/get_equipment/{id}',[WorkPlaceController::class, 'get_equipment']);
                //获取单个设备报警信息
                Route::get('workplace/get_alart_datas/{id}',[WorkPlaceController::class, 'get_alart_datas']);
                //设备总览
                Route::get('workplace/get_equipment_function_num',[WorkPlaceController::class, 'get_equipment_function_num']);
                //设备增长趋势
                Route::get('workplace/equipment_increase', [WorkPlaceController::class, 'equipment_increase']);
                //分项设备在线离线数量柱图
                Route::get('workplace/getEquipmentColumnfunctionData', [WorkPlaceController::class, 'getEquipmentColumnfunctionData']);
                //工单统计
                Route::get('workplace/get_work_orders', [WorkPlaceController::class, 'get_work_orders']);
                //报警统计
                Route::get('workplace/get_alarm_data_tj', [WorkPlaceController::class, 'get_alarm_data_tj']);
                Route::get('workplace/mxelementdata/{id}', [WorkPlaceController::class, 'mxelementdata']);
            });
    });
