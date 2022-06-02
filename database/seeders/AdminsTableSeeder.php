<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'username' => 'admin',
                'password' => '$2y$10$16kXGHAvlmphMe9Fzd4Q0uchXdDNepTs9BSeC3Yhj3g9G5./66xoG',
                'owner' => '-',
                'phone' => '-',
                'address' => '-',
                'logo' => 'user/admin.png',
                'remember_token' => 'qwDaoDcnR9EJlCcV4ATIIxnAaPym760Zeh1LqlfQ4aEf6ZXSTDpzscLpoYFi',
                'is_admin' => '1',
                'created_at' => '2021-08-17 17:47:11',
                'updated_at' => '2021-08-19 02:26:16',
            ),
        ));
        
        
    }
}