<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => '首页',
                'icon' => 'fa-bar-chart',
                'uri' => '/',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2021-06-02 11:45:48',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 21,
                'title' => '系统管理',
                'icon' => 'fa-tasks',
                'uri' => NULL,
                'permission' => 'auth.management',
                'created_at' => NULL,
                'updated_at' => '2021-06-02 11:45:48',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 22,
                'title' => '管理员',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => 'auth.management',
                'created_at' => NULL,
                'updated_at' => '2021-06-02 11:45:48',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 23,
                'title' => '角色',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => 'auth.management',
                'created_at' => NULL,
                'updated_at' => '2021-06-02 11:45:48',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 24,
                'title' => '权限',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => 'auth.management',
                'created_at' => NULL,
                'updated_at' => '2021-06-02 11:45:48',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 25,
                'title' => '菜单',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => 'auth.management',
                'created_at' => NULL,
                'updated_at' => '2021-06-02 11:45:48',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 26,
                'title' => '操作日志',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => 'auth.management',
                'created_at' => NULL,
                'updated_at' => '2021-06-02 11:45:48',
            ),
            7 => 
            array (
                'id' => 11,
                'parent_id' => 0,
                'order' => 7,
                'title' => '智能运维',
                'icon' => 'fa-opera',
                'uri' => NULL,
                'permission' => 'maintenance',
                'created_at' => '2021-05-08 12:06:37',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            8 => 
            array (
                'id' => 20,
                'parent_id' => 11,
                'order' => 8,
                'title' => '视频对讲',
                'icon' => 'fa-bars',
                'uri' => '/videos',
                'permission' => 'maintenance',
                'created_at' => '2021-05-08 12:37:42',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            9 => 
            array (
                'id' => 21,
                'parent_id' => 11,
                'order' => 9,
                'title' => '设备报修',
                'icon' => 'fa-bars',
                'uri' => '/repairs',
                'permission' => 'maintenance',
                'created_at' => '2021-05-08 12:37:59',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            10 => 
            array (
                'id' => 22,
                'parent_id' => 11,
                'order' => 10,
                'title' => '设备巡检',
                'icon' => 'fa-bars',
                'uri' => '/inspections',
                'permission' => 'maintenance',
                'created_at' => '2021-05-08 12:38:27',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            11 => 
            array (
                'id' => 23,
                'parent_id' => 11,
                'order' => 11,
                'title' => '工单管理',
                'icon' => 'fa-bars',
                'uri' => '/work_orders',
                'permission' => 'maintenance',
                'created_at' => '2021-05-08 12:38:53',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            12 => 
            array (
                'id' => 61,
                'parent_id' => 0,
                'order' => 20,
                'title' => '系统设置',
                'icon' => 'fa-cog',
                'uri' => '/form',
                'permission' => 'admin_setting',
                'created_at' => '2021-05-12 23:07:52',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            13 => 
            array (
                'id' => 62,
                'parent_id' => 67,
                'order' => 13,
                'title' => '报警设置',
                'icon' => 'fa-bars',
                'uri' => '/alarms',
                'permission' => 'alarms',
                'created_at' => '2021-05-13 08:14:45',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            14 => 
            array (
                'id' => 63,
                'parent_id' => 67,
                'order' => 14,
                'title' => '报警记录',
                'icon' => 'fa-bars',
                'uri' => '/alarm_datas',
                'permission' => 'alarms',
                'created_at' => '2021-05-13 08:48:08',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            15 => 
            array (
                'id' => 67,
                'parent_id' => 0,
                'order' => 12,
                'title' => '智能报警',
                'icon' => 'fa-comments-o',
                'uri' => NULL,
                'permission' => 'alarms',
                'created_at' => '2021-05-17 07:08:49',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            16 => 
            array (
                'id' => 68,
                'parent_id' => 0,
                'order' => 18,
                'title' => '入驻用户',
                'icon' => 'fa-user',
                'uri' => '/admin_users',
                'permission' => 'AdminUsers',
                'created_at' => '2021-06-02 09:52:52',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            17 => 
            array (
                'id' => 69,
                'parent_id' => 0,
                'order' => 19,
                'title' => '子账号',
                'icon' => 'fa-users',
                'uri' => '/child_users',
                'permission' => 'child_user',
                'created_at' => '2021-06-02 10:01:59',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            18 => 
            array (
                'id' => 70,
                'parent_id' => 0,
                'order' => 15,
                'title' => '设备配置',
                'icon' => 'fa-gears',
                'uri' => NULL,
                'permission' => 'equipment',
                'created_at' => '2021-06-02 10:17:39',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            19 => 
            array (
                'id' => 71,
                'parent_id' => 70,
                'order' => 16,
                'title' => '采集设备',
                'icon' => 'fa-bars',
                'uri' => '/equipments',
                'permission' => 'equipment',
                'created_at' => '2021-06-02 10:19:48',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            20 => 
            array (
                'id' => 72,
                'parent_id' => 70,
                'order' => 17,
                'title' => '项目管理',
                'icon' => 'fa-bars',
                'uri' => '/projects',
                'permission' => 'equipment',
                'created_at' => '2021-06-02 10:29:32',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            21 => 
            array (
                'id' => 73,
                'parent_id' => 0,
                'order' => 2,
                'title' => '数据报表',
                'icon' => 'fa-table',
                'uri' => NULL,
                'permission' => 'equipment_data',
                'created_at' => '2021-06-02 11:40:49',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            22 => 
            array (
                'id' => 74,
                'parent_id' => 73,
                'order' => 3,
                'title' => '三相电表',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => 'equipment_data',
                'created_at' => '2021-06-02 11:41:50',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            23 => 
            array (
                'id' => 75,
                'parent_id' => 73,
                'order' => 4,
                'title' => '单项电表',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => 'equipment_data',
                'created_at' => '2021-06-02 11:42:09',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            24 => 
            array (
                'id' => 76,
                'parent_id' => 73,
                'order' => 5,
                'title' => '远传水表',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => 'equipment_data',
                'created_at' => '2021-06-02 11:42:24',
                'updated_at' => '2021-06-02 11:45:48',
            ),
            25 => 
            array (
                'id' => 78,
                'parent_id' => 73,
                'order' => 6,
                'title' => '光伏发电',
                'icon' => 'fa-bars',
                'uri' => NULL,
                'permission' => 'equipment_data',
                'created_at' => '2021-06-02 11:43:36',
                'updated_at' => '2021-06-02 11:45:48',
            ),
        ));
        
        
    }
}