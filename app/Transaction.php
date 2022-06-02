<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $appends = ['status_badge'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getStatusBadgeAttribute(){

        switch ($this->status) {
            case 'success':
                $color = 'success';
                break;
            
            case 'canceled':
            default:
                $color = 'warning';
                break;
        }
        $badge = '<span class="badge badge-'.$color.'">'.$this->status.'</span>';
        return $badge;

    }

    public function detail(){
        return $this->hasMany(TransactionDetail::class);
    }

}
