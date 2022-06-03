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
					$c->where('made_in', $request->country);
				});
			}

			if($request->condition){
				$products->whereHas('details', function ($c) use ($request){
					$c->where('condition', 'LIKE' ,"%{$request->condition}%");
				});
			}

			if($request->type){
				$products->whereHas('details', function ($t) use ($request){
					$t->where('type', $request->type);
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

			if($request->from_year || $request->to_year){
				$products->whereHas('details', function ($y) use ($request){
					$y->where('year', '>=', $request->from_year)->where('year', '<=', $request->to_year);
				});
			}
			if($request->up_year){
				$products->whereHas('details', function ($y) use ($request){
					$y->where('year', '>=', $request->up_year);
				});
			}

			$data['products'] = $products->get();

			$data['brand'] = Brand::where('name' , $request->brd)->first();	
		}else{
			$data['products'] = Product::whereNull('status')->get();
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
			})->whereNull('status')->get();
		}else{
			$data['products'] = Product::whereNull('status')->get();
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
			$data['detail'] = ProductDetail::where('product_id', $product->id)->first();
			$data['images'] = ProductImage::where('product_id', $product->id)->get();
			$data['type'] = 'detail';
		}else{
			abort(404);
		}
		return view('product_detail', $data);
	}

	public function detailVault($code){
		$product = PrivateVault::where('slug', $code)->first();
		if($product){
			$data['product']= $product;
			$data['detail'] = PrivateVaultDetail::where('product_id', $product->id)->first();
			$data['images'] = PrivateVaultImage::where('product_id', $product->id)->get();
			$data['type'] = 'private-vault';
		}else{
			abort(404);
		}
		return view('product_detail', $data);

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
