<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTrade extends Model
{
    protected $casts = [
        'images' => 'array'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
