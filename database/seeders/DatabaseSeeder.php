<?php

use Illuminate\Database\Seeder;
use Database\Seeders\BrandsTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\SettingsTableSeeder;
use Database\Seeders\AdminsTableSeeder;
use Database\Seeders\ProductsTableSeeder;
use Database\Seeders\ProductDetailsTableSeeder;
use Database\Seeders\ProductImagesTableSeeder;
use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductDetailsTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
