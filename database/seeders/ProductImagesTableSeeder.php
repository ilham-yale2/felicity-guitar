<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_images')->delete();
        
        \DB::table('product_images')->insert(array (
            0 => 
            array (
                'id' => '4',
                'product_id' => '1',
                'image' => 'product/2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish-G17W.jpg',
                'created_at' => '2022-05-17 06:33:54',
                'updated_at' => '2022-05-17 06:33:54',
            ),
            1 => 
            array (
                'id' => '18',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-N24E.jpg',
                'created_at' => '2022-05-18 05:23:03',
                'updated_at' => '2022-05-18 05:23:03',
            ),
            2 => 
            array (
                'id' => '5',
                'product_id' => '1',
                'image' => 'product/2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish-17LG.jpg',
                'created_at' => '2022-05-17 06:33:55',
                'updated_at' => '2022-05-17 06:33:55',
            ),
            3 => 
            array (
                'id' => '6',
                'product_id' => '1',
                'image' => 'product/2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish-CQZ6.jpg',
                'created_at' => '2022-05-17 06:33:55',
                'updated_at' => '2022-05-17 06:33:55',
            ),
            4 => 
            array (
                'id' => '7',
                'product_id' => '1',
                'image' => 'product/2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish-5UER.jpg',
                'created_at' => '2022-05-17 06:33:56',
                'updated_at' => '2022-05-17 06:33:56',
            ),
            5 => 
            array (
                'id' => '8',
                'product_id' => '1',
                'image' => 'product/2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish-I84F.jpg',
                'created_at' => '2022-05-17 06:33:56',
                'updated_at' => '2022-05-17 06:33:56',
            ),
            6 => 
            array (
                'id' => '9',
                'product_id' => '1',
                'image' => 'product/2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish-V8C8.jpg',
                'created_at' => '2022-05-17 06:33:56',
                'updated_at' => '2022-05-17 06:33:56',
            ),
            7 => 
            array (
                'id' => '10',
                'product_id' => '1',
                'image' => 'product/2004-rickenbacker-36012-semi-hollowbody-in-montezuma-brown-finish-OU1D.jpg',
                'created_at' => '2022-05-17 06:33:57',
                'updated_at' => '2022-05-17 06:33:57',
            ),
            8 => 
            array (
                'id' => '11',
                'product_id' => '2',
                'image' => 'product/2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish-8PUX.jpg',
                'created_at' => '2022-05-17 07:29:56',
                'updated_at' => '2022-05-17 07:29:56',
            ),
            9 => 
            array (
                'id' => '12',
                'product_id' => '2',
                'image' => 'product/2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish-RX4D.jpg',
                'created_at' => '2022-05-17 07:29:56',
                'updated_at' => '2022-05-17 07:29:56',
            ),
            10 => 
            array (
                'id' => '13',
                'product_id' => '2',
                'image' => 'product/2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish-127Z.jpg',
                'created_at' => '2022-05-17 07:29:57',
                'updated_at' => '2022-05-17 07:29:57',
            ),
            11 => 
            array (
                'id' => '14',
                'product_id' => '2',
                'image' => 'product/2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish-ZZFR.jpg',
                'created_at' => '2022-05-17 07:29:57',
                'updated_at' => '2022-05-17 07:29:57',
            ),
            12 => 
            array (
                'id' => '15',
                'product_id' => '2',
                'image' => 'product/2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish-WXAY.jpg',
                'created_at' => '2022-05-17 07:29:57',
                'updated_at' => '2022-05-17 07:29:57',
            ),
            13 => 
            array (
                'id' => '16',
                'product_id' => '2',
                'image' => 'product/2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish-N2L0.jpg',
                'created_at' => '2022-05-17 07:29:58',
                'updated_at' => '2022-05-17 07:29:58',
            ),
            14 => 
            array (
                'id' => '17',
                'product_id' => '2',
                'image' => 'product/2010-gibson-les-paul-ltd-ed-slash-afd-in-butterscotch-no-burst-finish-DCFZ.jpg',
                'created_at' => '2022-05-17 07:29:58',
                'updated_at' => '2022-05-17 07:29:58',
            ),
            15 => 
            array (
                'id' => '19',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-8JEC.jpg',
                'created_at' => '2022-05-18 05:23:03',
                'updated_at' => '2022-05-18 05:23:03',
            ),
            16 => 
            array (
                'id' => '20',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-MXLH.jpg',
                'created_at' => '2022-05-18 05:23:03',
                'updated_at' => '2022-05-18 05:23:03',
            ),
            17 => 
            array (
                'id' => '21',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-Z241.jpg',
                'created_at' => '2022-05-18 05:23:05',
                'updated_at' => '2022-05-18 05:23:05',
            ),
            18 => 
            array (
                'id' => '22',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-M17A.jpg',
                'created_at' => '2022-05-18 05:23:05',
                'updated_at' => '2022-05-18 05:23:05',
            ),
            19 => 
            array (
                'id' => '23',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-C96C.jpg',
                'created_at' => '2022-05-18 05:23:05',
                'updated_at' => '2022-05-18 05:23:05',
            ),
            20 => 
            array (
                'id' => '24',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-OEQU.jpg',
                'created_at' => '2022-05-18 05:23:06',
                'updated_at' => '2022-05-18 05:23:06',
            ),
            21 => 
            array (
                'id' => '25',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-6E2L.jpg',
                'created_at' => '2022-05-18 05:23:06',
                'updated_at' => '2022-05-18 05:23:06',
            ),
            22 => 
            array (
                'id' => '26',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-W12J.jpg',
                'created_at' => '2022-05-18 05:23:07',
                'updated_at' => '2022-05-18 05:23:07',
            ),
            23 => 
            array (
                'id' => '27',
                'product_id' => '3',
                'image' => 'product/2013-gibson-montana-j-35-acoustic-in-antique-natural-finish-50GT.jpg',
                'created_at' => '2022-05-18 05:23:07',
                'updated_at' => '2022-05-18 05:23:07',
            ),
            24 => 
            array (
                'id' => '28',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-DXEJ.jpg',
                'created_at' => '2022-05-18 07:42:04',
                'updated_at' => '2022-05-18 07:42:04',
            ),
            25 => 
            array (
                'id' => '29',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-N6LI.jpg',
                'created_at' => '2022-05-18 07:42:05',
                'updated_at' => '2022-05-18 07:42:05',
            ),
            26 => 
            array (
                'id' => '30',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-CLWD.jpg',
                'created_at' => '2022-05-18 07:42:05',
                'updated_at' => '2022-05-18 07:42:05',
            ),
            27 => 
            array (
                'id' => '31',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-15MD.jpg',
                'created_at' => '2022-05-18 07:42:05',
                'updated_at' => '2022-05-18 07:42:05',
            ),
            28 => 
            array (
                'id' => '32',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-QYCG.jpg',
                'created_at' => '2022-05-18 07:42:06',
                'updated_at' => '2022-05-18 07:42:06',
            ),
            29 => 
            array (
                'id' => '33',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-EBFK.jpg',
                'created_at' => '2022-05-18 07:42:06',
                'updated_at' => '2022-05-18 07:42:06',
            ),
            30 => 
            array (
                'id' => '34',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-1E5A.jpg',
                'created_at' => '2022-05-18 07:42:06',
                'updated_at' => '2022-05-18 07:42:06',
            ),
            31 => 
            array (
                'id' => '35',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-5ID3.jpg',
                'created_at' => '2022-05-18 07:42:07',
                'updated_at' => '2022-05-18 07:42:07',
            ),
            32 => 
            array (
                'id' => '36',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-TMRJ.jpg',
                'created_at' => '2022-05-18 07:42:07',
                'updated_at' => '2022-05-18 07:42:07',
            ),
            33 => 
            array (
                'id' => '37',
                'product_id' => '4',
                'image' => 'product/2013-ibanez-j-custom-rg20136-bsz-00-ltd-ed-in-smoke-brown-topaz-finish-PQ3K.jpg',
                'created_at' => '2022-05-18 07:42:07',
                'updated_at' => '2022-05-18 07:42:07',
            ),
            34 => 
            array (
                'id' => '38',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-6TW6.jpg',
                'created_at' => '2022-05-18 08:41:21',
                'updated_at' => '2022-05-18 08:41:21',
            ),
            35 => 
            array (
                'id' => '39',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-G3BK.jpg',
                'created_at' => '2022-05-18 08:41:21',
                'updated_at' => '2022-05-18 08:41:21',
            ),
            36 => 
            array (
                'id' => '40',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-S76H.jpg',
                'created_at' => '2022-05-18 08:41:21',
                'updated_at' => '2022-05-18 08:41:21',
            ),
            37 => 
            array (
                'id' => '41',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-G605.jpg',
                'created_at' => '2022-05-18 08:41:22',
                'updated_at' => '2022-05-18 08:41:22',
            ),
            38 => 
            array (
                'id' => '42',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-ALY4.jpg',
                'created_at' => '2022-05-18 08:41:22',
                'updated_at' => '2022-05-18 08:41:22',
            ),
            39 => 
            array (
                'id' => '43',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-RQ55.jpg',
                'created_at' => '2022-05-18 08:41:22',
                'updated_at' => '2022-05-18 08:41:22',
            ),
            40 => 
            array (
                'id' => '44',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-D0LO.jpg',
                'created_at' => '2022-05-18 08:41:23',
                'updated_at' => '2022-05-18 08:41:23',
            ),
            41 => 
            array (
                'id' => '45',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-5V3I.jpg',
                'created_at' => '2022-05-18 08:41:23',
                'updated_at' => '2022-05-18 08:41:23',
            ),
            42 => 
            array (
                'id' => '46',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-E63Z.jpg',
                'created_at' => '2022-05-18 08:41:24',
                'updated_at' => '2022-05-18 08:41:24',
            ),
            43 => 
            array (
                'id' => '47',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-F3FA.jpg',
                'created_at' => '2022-05-18 08:41:25',
                'updated_at' => '2022-05-18 08:41:25',
            ),
            44 => 
            array (
                'id' => '48',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-N2RN.jpg',
                'created_at' => '2022-05-18 08:41:25',
                'updated_at' => '2022-05-18 08:41:25',
            ),
            45 => 
            array (
                'id' => '49',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-LIRM.jpg',
                'created_at' => '2022-05-18 08:41:25',
                'updated_at' => '2022-05-18 08:41:25',
            ),
            46 => 
            array (
                'id' => '50',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-C0KW.jpg',
                'created_at' => '2022-05-18 08:41:26',
                'updated_at' => '2022-05-18 08:41:26',
            ),
            47 => 
            array (
                'id' => '51',
                'product_id' => '5',
                'image' => 'product/2016-epiphone-hummingbird-pro-acoustic-in-faded-cherry-sunburst-finish-PLNJ.jpg',
                'created_at' => '2022-05-18 08:41:26',
                'updated_at' => '2022-05-18 08:41:26',
            ),
            48 => 
            array (
                'id' => '52',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-WVN3.jpg',
                'created_at' => '2022-05-18 09:05:45',
                'updated_at' => '2022-05-18 09:05:45',
            ),
            49 => 
            array (
                'id' => '53',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-KS9L.jpg',
                'created_at' => '2022-05-18 09:05:46',
                'updated_at' => '2022-05-18 09:05:46',
            ),
            50 => 
            array (
                'id' => '54',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-102Y.jpg',
                'created_at' => '2022-05-18 09:05:46',
                'updated_at' => '2022-05-18 09:05:46',
            ),
            51 => 
            array (
                'id' => '55',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-UUZ6.jpg',
                'created_at' => '2022-05-18 09:05:46',
                'updated_at' => '2022-05-18 09:05:46',
            ),
            52 => 
            array (
                'id' => '56',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-AKLT.jpg',
                'created_at' => '2022-05-18 09:05:47',
                'updated_at' => '2022-05-18 09:05:47',
            ),
            53 => 
            array (
                'id' => '57',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-1NJ2.jpg',
                'created_at' => '2022-05-18 09:05:47',
                'updated_at' => '2022-05-18 09:05:47',
            ),
            54 => 
            array (
                'id' => '58',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-90PD.jpg',
                'created_at' => '2022-05-18 09:05:47',
                'updated_at' => '2022-05-18 09:05:47',
            ),
            55 => 
            array (
                'id' => '59',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-67FC.jpg',
                'created_at' => '2022-05-18 09:05:48',
                'updated_at' => '2022-05-18 09:05:48',
            ),
            56 => 
            array (
                'id' => '60',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-25U2.jpg',
                'created_at' => '2022-05-18 09:05:48',
                'updated_at' => '2022-05-18 09:05:48',
            ),
            57 => 
            array (
                'id' => '61',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-RBEA.jpg',
                'created_at' => '2022-05-18 09:05:49',
                'updated_at' => '2022-05-18 09:05:49',
            ),
            58 => 
            array (
                'id' => '62',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-DC4B.jpg',
                'created_at' => '2022-05-18 09:05:49',
                'updated_at' => '2022-05-18 09:05:49',
            ),
            59 => 
            array (
                'id' => '63',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-7CV6.jpg',
                'created_at' => '2022-05-18 09:05:49',
                'updated_at' => '2022-05-18 09:05:49',
            ),
            60 => 
            array (
                'id' => '64',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-8Z99.jpg',
                'created_at' => '2022-05-18 09:05:50',
                'updated_at' => '2022-05-18 09:05:50',
            ),
            61 => 
            array (
                'id' => '65',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-P6GI.jpg',
                'created_at' => '2022-05-18 09:05:50',
                'updated_at' => '2022-05-18 09:05:50',
            ),
            62 => 
            array (
                'id' => '66',
                'product_id' => '6',
                'image' => 'product/2014-gibson-ltd-ed-lzzy-hale-signature-explorer-in-alpine-white-finish-AZZJ.jpg',
                'created_at' => '2022-05-18 09:05:50',
                'updated_at' => '2022-05-18 09:05:50',
            ),
            63 => 
            array (
                'id' => '67',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-1X40.jpg',
                'created_at' => '2022-05-19 06:49:15',
                'updated_at' => '2022-05-19 06:49:15',
            ),
            64 => 
            array (
                'id' => '68',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-4JBL.jpg',
                'created_at' => '2022-05-19 06:49:16',
                'updated_at' => '2022-05-19 06:49:16',
            ),
            65 => 
            array (
                'id' => '69',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-R4SJ.jpg',
                'created_at' => '2022-05-19 06:49:16',
                'updated_at' => '2022-05-19 06:49:16',
            ),
            66 => 
            array (
                'id' => '70',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-9FUW.jpg',
                'created_at' => '2022-05-19 06:49:16',
                'updated_at' => '2022-05-19 06:49:16',
            ),
            67 => 
            array (
                'id' => '71',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-9DI5.jpg',
                'created_at' => '2022-05-19 06:49:17',
                'updated_at' => '2022-05-19 06:49:17',
            ),
            68 => 
            array (
                'id' => '72',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-OJFD.jpg',
                'created_at' => '2022-05-19 06:49:17',
                'updated_at' => '2022-05-19 06:49:17',
            ),
            69 => 
            array (
                'id' => '73',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-3MC0.jpg',
                'created_at' => '2022-05-19 06:49:18',
                'updated_at' => '2022-05-19 06:49:18',
            ),
            70 => 
            array (
                'id' => '74',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-XG53.jpg',
                'created_at' => '2022-05-19 06:49:18',
                'updated_at' => '2022-05-19 06:49:18',
            ),
            71 => 
            array (
                'id' => '75',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-WGJC.jpg',
                'created_at' => '2022-05-19 06:49:19',
                'updated_at' => '2022-05-19 06:49:19',
            ),
            72 => 
            array (
                'id' => '76',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-OT8L.jpg',
                'created_at' => '2022-05-19 06:49:19',
                'updated_at' => '2022-05-19 06:49:19',
            ),
            73 => 
            array (
                'id' => '77',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-LM98.jpg',
                'created_at' => '2022-05-19 06:49:19',
                'updated_at' => '2022-05-19 06:49:19',
            ),
            74 => 
            array (
                'id' => '78',
                'product_id' => '7',
                'image' => 'product/2015-taylor-214ce-k-dlx-koa-wood-acoustic-guitar-in-natural-finsih-GH08.jpg',
                'created_at' => '2022-05-19 06:49:20',
                'updated_at' => '2022-05-19 06:49:20',
            ),
        ));
        
        
    }
}