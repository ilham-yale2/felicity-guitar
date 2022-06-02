<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fender',
                'created_at' => '2022-05-13 04:25:12',
                'updated_at' => '2022-05-13 04:25:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Rickenbacker',
                'created_at' => '2022-05-13 04:25:12',
                'updated_at' => '2022-05-13 04:34:32',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'Taylor',
                'created_at' => '2022-05-11 08:57:10',
                'updated_at' => '2022-05-13 04:30:41',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'Gretsch',
                'created_at' => '2022-05-11 08:58:20',
                'updated_at' => '2022-05-13 04:29:47',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'Ibanez',
                'created_at' => '2022-05-11 09:08:14',
                'updated_at' => '2022-05-13 04:26:23',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'Gibson',
                'created_at' => '2022-05-11 09:08:35',
                'updated_at' => '2022-05-13 04:26:04',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'Kitharra',
                'created_at' => '2022-05-13 04:35:02',
                'updated_at' => '2022-05-13 04:35:02',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'ESP',
                'created_at' => '2022-05-13 04:35:23',
                'updated_at' => '2022-05-13 04:35:23',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'Epiphone',
                'created_at' => '2022-05-13 04:35:42',
                'updated_at' => '2022-05-13 04:35:42',
            ),
        ));
        
        
    }
}