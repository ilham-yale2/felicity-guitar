<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Felicity-Guitar',
                'description' => 'Rumah Batik Kabupaten Probolinggo merupakan sarana berkarya bagi pelaku kerajinan batik lokal, bordir, dan aksesoris.',
                'phone' => '081336453815',
                'whatsapp_template' => 'Halo saya ingin membeli produk',
                'image' => 'setting/logo-felicity.png',
                'location' => 'Probolinggo - Jawa Timur',
                'map' => 'https://goo.gl/maps/Kx5KoUjeUzWmi2K67',
                'shopee' => 'https://shopee.co.id/rumahbatikprobolinggo',
                'tokopedia' => 'https://www.tokopedia.com/rumahbatikprobolinggo',
                'facebook' => 'Rumah Batik Probolinggo',
                'facebook_link' => 'https://facebook.com/rumahbatikpbl',
                'instagram' => '@rumahbatikprobolinggo',
                'instagram_link' => 'https://instagram.com/rumahbatikprobolinggo',
                'youtube' => 'https://youtube.com/channel/UCoRQx_HY78JlTfoCz8IWFbw',
                'youtube_link' => NULL,
                'email' => 'rumahbatik.probolinggo@gmail.com',
                'seo_keyword' => 'rumah batik probolinggo, rumah batik, probolinggo, batik probolinggo, batik, jawa timur, batik jawa timur, kain, busana, busana batik, busana pria, busana wanita, atasan wanita, bawahan wanita, tas, dompet, scarf, syal, kain batik, baju batik, tradisional',
                'created_at' => NULL,
                'updated_at' => '2022-03-22 20:32:47',
            ),
        ));
        
        
    }
}