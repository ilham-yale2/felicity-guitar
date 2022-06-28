<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Str;

class Product extends Model
{
    protected $casts = ['tags' => 'array'];
    protected $guarded = ['id'];
    protected $appends = ['sell_price_format', 'name_slug', 'wa_link', 'year', 'alt_image'];

    public function getSellPriceFormatAttribute()
    {
        return number_format($this->sell_price, 0, ',', '.');
    }

    public function getNameSlugAttribute()
    {
        return Str::slug($this->name);
    }

    public function getWaLinkAttribute()
    {
        $phone = "https://wa.me/" . Setting::first()->phone_with_code . "?text=";
        $text = Setting::first()->whatsapp_template . "\n";
        $text .= '*'  . $this->name . "*\n";
        $text .= route('detail-product', ['name' => $this->slug]);
        return $phone . urlencode($text);
            
    }

    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function details()
    {
        return $this->hasMany('App\ProductDetail');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function brand(){
        return $this->belongsTo('App\Brand');
    }

    public function getYearAttribute(){
        $year = ProductDetail::where('title', 'year')->where('product_id', $this->id)->first();
        if($year){
            return $year->value;
        }else{
            return '';
        }
    }
    public function getAltImageAttribute(){
        $detail = ProductDetail::where('product_id', $this->id)->where('title', 'year');
        return $this->year .'-' . str_replace(' ', '-', $this->name );
    }
}
