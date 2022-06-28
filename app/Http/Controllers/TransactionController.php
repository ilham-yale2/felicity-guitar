<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Transaction;
use App\Http\Controllers\Controller;
use App\Product;
use App\Setting;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['transactions'] = Transaction::with('detail')->get();
        // return $data;
        return view('transaction.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            $txt = '*PERSONAL DETAIL*'."\n";
            $txt .= 'First Name: '.$request->first_name."\n";
            
            $txt .= 'Last Name: '.$request->last_name."\n";
            $txt .= 'Street Address: '.$request->street_address."\n";
            $txt .= 'Sub Distric: '.$request->sub_distric."\n";
            $txt .= 'Town/CIty: '.$request->city."\n";
            $txt .= 'Province: '.$request->province."\n";
            $txt .= 'Country/Region: '.$request->country."\n";
            $txt .= 'Postcode: '.$request->postcode."\n";
            $txt .= 'Email: '.$request->email."\n";
            $txt .= 'Phone: '.$request->phone."\n";

            $txt .= "\n".'*SHIPPING ADDRESS*'."\n" ;
            
            if($request->different){
                $txt .= 'Street Adddress: '. $request->shipping_address."\n";
                $txt .= 'Sub Distric: '.$request->shipping_sub_distric."\n";
                $txt .= 'Town/City: '.$request->shipping_city."\n";
                $txt .= 'Province: '.$request->shipping_province."\n";
                $txt .= 'Country/Region: '.$request->shipping_country."\n";
                $txt .= 'Postcode/ZIP: '.$request->shipping_postcode."\n";
            }else{
                $txt .= 'Street Adddress: '.$request->street_address."\n";
                $txt .= 'Sub Distric: '.$request->sub_distric."\n";
                $txt .= 'Town/City: '.$request->city."\n";
                $txt .= 'Province: '.$request->province."\n";
                $txt .= 'Country/Region: '.$request->country."\n";
                $txt .= 'Postcode/ZIP: '.$request->postcode."\n";
            }
            foreach($request->product_id as $key => $value){
                $cart = Cart::find(Crypt::decryptString($request->product_id[$key]));
                $product = Product::find($cart->product_id);
                $text = "\n".'*' .$product->name ."*\n";
                $text .= route('detail-product', ['name' => $product->slug]) ."\n";
                $txt .= $text;
            }
            $phone = 'https://wa.me/' . Setting::first()->phone_with_code .'?text=';
            $data['link'] = $phone.$txt;
            return redirect($phone.urlencode($txt));

            // if($request->product_id){
            //     foreach($request->product_id as $key => $value){
            //         $cart = Cart::find(Crypt::decryptString($request->product_id[$key]));
                    
            //         if(!$cart){

            //             $status = [
            //                 'status' => 'error',
            //                 'text' => 'The product has been sold',
            //             ];
            //             return redirect()->back()->with(['message' => $status]);
            //         }
            //     }
            // }if($request->product){
            //     $product = Product::find(Crypt::decryptString($request->product));
            //     if($product->status == 'sold'){
            //         $status = [
            //             'status' => 'error',
            //             'text' => 'The product has been sold',
            //         ];
            //         return redirect()->back()->with(['message' => $status]);
            //     }
            // }
            
            // $qty = 0;
            // $total = 0;

            // if($request->different){
            //     $shipping_address = $request->shipping_address;
            //     $shipping_sub_distric = $request->shipping_sub_distric;
            //     $shipping_city = $request->shipping_city;
            //     $shipping_province = $request->shipping_province;
            //     $shipping_country = $request->shipping_country;
            //     $shipping_postcode = $request->shipping_postcode;
            // }else{
            //     $shipping_address = $request->street_address;
            //     $shipping_sub_distric = $request->sub_distric;
            //     $shipping_city = $request->city;
            //     $shipping_province = $request->province;
            //     $shipping_country = $request->country;
            //     $shipping_postcode = $request->postcode;
            // }

            // $transaction = new Transaction();
            // $transaction->first_name = $request->first_name;
            // $transaction->last_name = $request->last_name;
            // $transaction->street_address = $request->street_address;
            // $transaction->city = $request->city;
            // $transaction->province = $request->province;
            // $transaction->country = $request->country;
            // $transaction->postcode = $request->postcode;
            // $transaction->email = $request->email;
            // $transaction->phone = $request->phone;
            // $transaction->sub_distric = $request->sub_distric;

            // $transaction->shipping_address = $shipping_address;
            // $transaction->shipping_sub_distric = $shipping_sub_distric;
            // $transaction->shipping_city = $shipping_city;
            // $transaction->shipping_province = $shipping_province;
            // $transaction->shipping_country = $shipping_country;
            // $transaction->shipping_postcode = $shipping_postcode;
            // $transaction->save();
            
            // if($request->product_id){
            //     // checkout from user cart
            //     foreach($request->product_id as $key => $value){
            //         $cart = Cart::find(Crypt::decryptString($request->product_id[$key]));
            //         $detail = new TransactionDetail();
            //         $detail->transaction_id = $transaction->id;
            //         $detail->product_id = $cart->product_id;
            //         $detail->price = $cart->product->sell_price;
            //         $detail->qty = $cart->qty;
            //         $detail->total = $detail->price * $detail->qty;
            //         $detail->save();
    
            //         $qty = $qty + $detail->qty;
            //         $total = $total + $detail->total;
                    
            //         $product = Product::find($cart->product_id);
            //         $product->status = 'sold';
            //         $product->save();
            //         $cart->delete();
            //     }
            // }else{
            //     // buy now
            //     $product = Product::find(Crypt::decryptString($request->product));
            //     $detail = new TransactionDetail();
            //     $detail->transaction_id = $transaction->id;
            //     $detail->product_id = $product->id;
            //     $detail->price = $product->sell_price;
            //     $detail->qty = 1;
            //     $detail->total = $detail->price * $detail->qty;
            //     $detail->save();

            //     $product->status = 'sold';
            //     $product->save();

            //     $qty = $qty + $detail->qty;
            //     $total = $total + $detail->total;
            // }
            // $transaction->status = 'pending';
            // if(Auth::guard('user')->user()){
            //     $transaction->user_id = Auth::guard('user')->user()->id;
            // }
            // $transaction->qty = $qty;
            // $transaction->total = $total;
            // $transaction->save();
            // DB::commit();

            // return response()->json([
            //     'transaction' => $transaction,
            //     'detail' => $detail
            // ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
