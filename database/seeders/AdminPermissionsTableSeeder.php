<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_permissions')->delete();
        
        \DB::table('admin_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'All permission',
                'slug' => '*',
                'http_method' => '',
                'http_path' => '*',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'http_method' => 'GET',
                'http_path' => '/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Login',
                'slug' => 'auth.login',
                'http_method' => '',
                'http_path' => '/auth/login
/auth/logout',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'User setting',
                'slug' => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path' => '/auth/setting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Auth management',
                'slug' => 'auth.management',
                'http_method' => '',
                'http_path' => '/auth/roles
/auth/permissions
/auth/menu
/auth/logs',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '入驻用户',
                'slug' => 'AdminUsers',
                'http_method' => '',
                'http_path' => '/admin_users*',
                'created_at' => '2021-06-02 09:54:28',
                'updated_at' => '2021-06-02 10:02:32',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '子账号管理',
                'slug' => 'child_user',
                'http_method' => '',
                'http_path' => '/child_users*',
                'created_at' => '2021-06-02 10:02:21',
                'updated_at' => '2021-06-02 10:02:39',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '系统设置',
                'slug' => 'admin_setting',
                'http_method' => '',
                'http_path' => '/form*',
                'created_at' => '2021-06-02 10:04:29',
                'updated_at' => '2021-06-02 10:04:29',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '设备配置',
                'slug' => 'equipment',
                'http_method' => '',
                'http_path' => '/equipments*
/projects*',
                'created_at' => '2021-06-02 10:17:59',
                'updated_at' => '2021-06-02 10:30:06',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '智能报警',
                'slug' => 'alarms',
                'http_method' => '',
                'http_path' => '/alarms*
/alarm_datas*',
                'created_at' => '2021-06-02 11:27:25',
                'updated_at' => '2021-06-02 11:27:25',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '智能运维',
                'slug' => 'maintenance',
                'http_method' => '',
                'http_path' => '/videos*
/repairs*
/inspections*
/work_orders*',
                'created_at' => '2021-06-02 11:36:34',
                'updated_at' => '2021-06-02 11:36:34',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '数据报表',
                'slug' => 'equipment_data',
                'http_method' => '',
                'http_path' => 'work_orders*',
                'created_at' => '2021-06-02 11:41:07',
                'updated_at' => '2021-06-02 11:47:58',
            ),
        ));
        
        
    }
}