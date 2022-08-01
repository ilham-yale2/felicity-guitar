<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateVault extends Model
{

    public $appends = ['wa_link', 'alt_image'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function getWaLinkAttribute()
    {
        $phone = "https://wa.me/" . Setting::first()->phone_with_code . "?text=";
        $text = Setting::first()->whatsapp_template . "\n";
        $text .= '*'  . $this->name . "*\n";
        $text .= route('detail-product', ['name' => $this->slug]);
        return $phone . urlencode($text);
            
    }

    public function getAltImageAttribute(){
        $detail = PrivateVaultDetail::where('product_id', $this->id)->where('title', 'year');
        // return $detail->value ?? '' .'-' . str_replace(' ', '-', $this->name );
    }
}
