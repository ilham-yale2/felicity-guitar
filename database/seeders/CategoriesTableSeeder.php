<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Electric Guitars',
                'created_at' => '2022-05-11 05:19:22',
                'updated_at' => '2022-05-11 08:10:07',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Accoustic Guitars',
                'created_at' => '2022-05-11 08:10:25',
                'updated_at' => '2022-05-11 08:10:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Amplifiers',
                'created_at' => '2022-05-11 08:10:39',
                'updated_at' => '2022-05-11 08:10:39',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Pedals',
                'created_at' => '2022-05-11 08:11:08',
                'updated_at' => '2022-05-11 08:11:08',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Accessories',
                'created_at' => '2022-05-11 08:12:14',
                'updated_at' => '2022-05-11 08:12:14',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Merchandise',
                'created_at' => '2022-05-11 08:12:35',
                'updated_at' => '2022-05-11 08:12:35',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Local Instruments',
                'created_at' => '2022-05-11 08:12:53',
                'updated_at' => '2022-05-11 08:12:53',
            ),
        ));
        
        
    }
}