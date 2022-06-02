<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Cart;
use App\Product;
use App\UserAddress;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::beginTransaction();
        try {
            $code = Crypt::decryptString($request->code);
            $product = Product::where('code', $code)->first();
            $userCart = Cart::where('product_id', $product->id)->where('user_id', Auth::guard('user')->user()->id)->first();
            if($userCart){
                $message = [
                    'status' => 'error',
                    'title' => 'Opps ...',
                    'text' => 'This product has been added to your cart',
                    'data' => $userCart
                ];
            }else{

                $cart = new Cart();
                $cart->product_id = $product->id;
                $cart->user_id = Auth::guard('user')->user()->id;
                $cart->price = $product->sell_price;
                $cart->qty = 1;
                $cart->save();
                DB::commit();
                $message = [
                    'status' => 'success',
                    'title' => 'Well done ...',
                    'text' => 'Success add to your cart',
                    'data' => $cart
                ];
            }
            return $message;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = Crypt::decryptString($request->product);
            // Cart::find($id)->delete();
            $message = [
                'status' => 'success',
                'title' => 'Well done ...',
                'text' => 'Success delete product in your cart',
            ];
            DB::commit();
            return $message;

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function checkout(Request $request){
        // return $request->all();
        if($request->product){
            $carts = array();
            foreach ($request->product as $key => $value) {
                $item = Cart::find(Crypt::decryptString($request->product[$key]));
                array_push($carts, $item);
            }
    
            $address = UserAddress::where('user_id', Auth::guard('user')->user()->id);
            $data['address'] = $address->get();
            $data['carts'] = $carts;
            return view('checkout' , $data);
        }else{
            return redirect()->route('cart');
        }
        
    }
    
}
