<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function makeCode($code, $length = 20)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $code . '-' . $randomString;
    }

    public function existsFile($file){
        $isExists = Storage::exists($file);
        return $isExists;
    }

    public function replaceDot($str){
        return str_replace('.', '', $str);
    }

    public function gearType(){
    }
}
