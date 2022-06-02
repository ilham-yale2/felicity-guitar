<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ilham',
                'email' => 'ilhammaghfiro@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$tamuLcOCtN2tRH7z4YmuTO7F.G/CfElaXT4NDemqa/AVEXu6W79f6',
                'remember_token' => 'inM4HDlBLOdoY1DVfQOoDxvAUIrjCNsrWlvEBBHzluwm4wOWZYotcffsLpQx',
                'created_at' => '2022-05-19 04:44:18',
                'updated_at' => '2022-05-19 04:44:18',
                'receive_email' => 0,
                'avatar' => '/user/user.png',
                'first_name' => 'ilham',
                'last_name' => 'magfiro',
                'phone' => NULL,
            ),
        ));
        
        
    }
}