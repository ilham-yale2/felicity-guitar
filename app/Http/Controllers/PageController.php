<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Cart;
use App\Category;
use App\Partner;
use App\PrivateVault;
use App\PrivateVaultDetail;
use App\PrivateVaultImage;
use App\Product;
use App\ProductDetail;
use App\ProductImage;
use App\TransactionDetail;
use App\UserAddress;
use App\UserTrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{


	public function cart()
	{
		if(Auth::guard('user')->user()){
			$data['products'] = Cart::where('user_id', Auth::guard('user')->user()->id)->orderBy('created_at', 'DESC')->get();
		}
		return view('cart', $data);
	}
	public function contact()
	{
		return view('contact');
	}
	public function accountPage()
	{
		$data['address'] = UserAddress::where('user_id', Auth::guard('user')->user()->id)->get();
		$data['transactions'] = TransactionDetail::whereHas('transaction', function ($t) {
			$t->where('user_id',Auth::guard('user')->user()->id);
		})->get();
	

		return view('account-page', $data);
	}

	public function privateVault()
	{
		$data['products'] = PrivateVault::whereNull('status')->get();
		return view('private-vault', $data);
		// if(Auth::guard('user')->user()){
		// }else{
		// 	return redirect()->route('sign-in');
		// }

	}
	public function browseBrand(Request $request)
	{
		if($request->brd){
			$products = Product::whereHas('brand', function ($p) use ($request){
				$p->where('name', $request->brd);
			})->whereNull('status');
			if($request->country){
				$products->whereHas('details', function ($c) use ($request){
					$c->where('title', 'LIKE' ,"%Country of Origin%")->where('value', $request->country);
				});
			}

			if($request->condition){
				$products->whereHas('details', function ($c) use ($request){
					$c->where('title','condition')->where('value', 'LIKE' ,"%{$request->condition}%");
				});
			}

			if($request->type){
				$products->whereHas('details', function ($t) use ($request){
					$t->where('title', 'body type')->where('value', $request->type);
				});
			}

			if($request->from_price || $request->to_price){
				// return $request->all();
				$products->where('sell_price', '>=', intval($request->from_price))->where('sell_price', '<=', intval($request->to_price));
			}

			if($request->up_to){
				// return $request->all();
				$products->where('sell_price', '>=', intval($request->up_to));
			}

			if($request->from_year){
				$products->whereHas('details', function ($y) use ($request){
					$y->where('title', 'year')->where('value', '>=', $request->from_year)->where('value', '<=', $request->to_year);
				});
			}
			if($request->up_year){
				$products->whereHas('details', function ($y) use ($request){
					$y->where('title', 'year')->where('value', '>=', $request->up_year);
				});
			}

			$data['products'] = $products->paginate(14);

			$data['brand'] = Brand::where('name' , $request->brd)->first();	
		}else{
			$data['products'] = Product::whereNull('status')->paginate(14);
			$data['brand'] = [ 'name' => 'Brand', 'image' => null];
		}
		$data['brands'] = Brand::all();
		return view('browse-brand', $data);
	}

	public function aboutUs()
	{
		$data['partners'] = Partner::all();
		return view('about-us', $data);
	}
	

	public function browseCategory(Request $request)
	{
		if($request->ctg){
			$data['products'] = Product::whereHas('category', function ($p) use ($request){
				$p->where('name', $request->ctg);
			})->whereNull('status')->paginate(14);

		    if($request->ctg == 'Pedals'){
				$data['col'] = 'col-md-3';
			}
			if($request->ctg == 'Amplifiers'){
				$data['col'] = 'col-md-4';
			}
		}else{
			$data['products'] = Product::whereNull('status')->paginate(14);
		}

		$data['categories'] = Category::all();

		return view('browse-category',$data);	
	}

	public function trade()
	{
		return view('trade');
	}

	public function checkoutAccount()
	{
		return view('checkout-account');
	}

	public function detailProduct($code)
	{
		
		$product = Product::where('slug', $code)->first();
		if($product){
			$data['product']= $product;
			$data['general'] = ProductDetail::where('product_id', $product->id)->where('type', 'general')->get();
			$data['electronic'] = ProductDetail::where('product_id', $product->id)->where('type', 'electronic')->get();
			$data['neck'] = ProductDetail::where('product_id', $product->id)->where('type', 'neck')->get();
			$data['body'] = ProductDetail::where('product_id', $product->id)->where('type', 'body')->get();
			$data['hardware'] = ProductDetail::where('product_id', $product->id)->where('type', 'hardware')->get();
			$data['miscellaneous'] = ProductDetail::where('product_id', $product->id)->where('type', 'miscellaneous')->get();
			$data['images'] = ProductImage::where('product_id', $product->id)->get();
		}else{
			abort(404);
		}
		return view('product_detail', $data);
	}

	public function detailVault($slug){
		$product = PrivateVault::where('slug', $slug)->first();
		if($product){
			$data['product']= $product;
			$data['general'] = PrivateVaultDetail::where('product_id', $product->id)->where('type', 'general')->get();
			$data['electronic'] = PrivateVaultDetail::where('product_id', $product->id)->where('type', 'electronic')->get();
			$data['neck'] = PrivateVaultDetail::where('product_id', $product->id)->where('type', 'neck')->get();
			$data['body'] = PrivateVaultDetail::where('product_id', $product->id)->where('type', 'body')->get();
			$data['hardware'] = PrivateVaultDetail::where('product_id', $product->id)->where('type', 'hardware')->get();
			$data['miscellaneous'] = PrivateVaultDetail::where('product_id', $product->id)->where('type', 'miscellaneous')->get();
			$data['images'] = PrivateVaultImage::where('product_id', $product->id)->get();
		}else{
			abort(404);
		}
		return view('private_vault_detail', $data);

	}

	public function buyNow(Request $request){
		if($request->product){
            $product = array();
            foreach ($request->product as $key => $value) {
                $item = Product::find(Crypt::decryptString($request->product[$key]));
                array_push($product, $item);
            }
			if(Auth::guard('user')->user()){

				$address = UserAddress::where('user_id', Auth::guard('user')->user()->id);
				$data['address'] = $address->get();
			}
            $data['carts'] = $product;
            return view('checkout' , $data);
        }else{
            return redirect()->route('home');
        }
	}

	public function search(Request $request){
		if($request->keyword != null){
			$data['products'] = Product::where('name', 'LIKE', "%{$request->keyword}%")->get();
		}else{
			$data['products'] = Product::all();
		}

		return view('search', $data);
	}
}
