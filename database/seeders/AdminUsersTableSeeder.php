<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'Administrator',
                'password' => '$2y$10$2vhPj/k/DeWvGMh5h35EH.X6tH34qyJ2NPM0lwsBBSEKfcB7STBeW',
                'name' => 'Administrator',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-06-02 09:30:18',
                'updated_at' => '2021-06-02 09:31:28',
                'parent_id' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'admin',
                'password' => '$2y$10$1vkSxL1kDiJS1tn00QHd1.e3ulegVWgPY7cUKW4R8nVuLUMYmGYa6',
                'name' => '管理员',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-06-02 09:31:42',
                'updated_at' => '2021-06-02 09:31:42',
                'parent_id' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'user1',
                'password' => '$2y$10$Xa42JrijqdFsyLOFaJU8PeP4pvSuDqDkcj52NhWZTdoolzq7NE8Zm',
                'name' => '用户1',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-06-02 09:44:37',
                'updated_at' => '2021-06-02 09:45:02',
                'parent_id' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'username' => 'z1',
                'password' => '$2y$10$tTj7sVoFM32ugowkT3WM1.HLggS5MS0n2lECaaz8WwxCBvOtO8sJe',
                'name' => '子账号1',
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-06-02 09:57:44',
                'updated_at' => '2021-06-02 09:57:44',
                'parent_id' => 0,
            ),
        ));
        
        
    }
}