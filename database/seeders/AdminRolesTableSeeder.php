<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_roles')->delete();
        
        \DB::table('admin_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'slug' => 'administrator',
                'created_at' => '2021-05-08 00:34:08',
                'updated_at' => '2021-05-08 00:34:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '管理员',
                'slug' => 'admin',
                'created_at' => '2021-05-08 11:37:39',
                'updated_at' => '2021-06-02 09:24:19',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '入驻用户',
                'slug' => 'user',
                'created_at' => '2021-05-09 16:23:17',
                'updated_at' => '2021-06-02 09:24:53',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '子账号',
                'slug' => 'c-user',
                'created_at' => '2021-06-02 09:25:10',
                'updated_at' => '2021-06-02 09:25:59',
            ),
        ));
        
        
    }
}