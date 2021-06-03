<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-08 08:34:09
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-13 09:58:45
 * @Description: admin后台路由
 * @FilePath: \laravel-admin\app\Admin\routes.php
 */

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@maps')->name('home.maps');

    //入驻用户管理
    $router->resource('admin_users', AdminUsersController::class);
    //子账号管理
    $router->resource('child_users', ChildUsersController::class);
    //光伏发电报表
    $router->resource('data_gffds', DataGffdsController::class);
    //单项电表报表
    $router->resource('data_dxdbs', DataDxdbsController::class);
    //三项电表报表
    $router->resource('data_sxdbs', DataSxdbsController::class);
    // todo 设备配置
    $router->resource('equipment_types', EquipmentTypesController::class);

    // todo 智能运维
    $router->resource('projects', ProjectsController::class);

    $router->resource('equipments', EquipmentsController::class);

    $router->resource('videos', VideosController::class);

    $router->resource('repairs', RepairsController::class);

    $router->resource('inspections', InspectionsController::class);

    $router->resource('work_orders', WorkOrdersController::class);

    $router->resource('children_admin_users', ChildrenAdminUsersController::class);
    // 网站设置
    $router->get('form', Setting::class);
    $router->post('form', Setting::class);

    // 设备报警
    $router->resource('alarms', AlarmsController::class);
    $router->resource('alarm_datas', AlarmDatasController::class);

    $router->post('/equipments/equipmentkz', 'EquipmentsController@equipmentkz');

    $router->get('/api/projects/equipment', 'EquipmentsController@project_equipment');
});
