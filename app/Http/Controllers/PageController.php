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

		
		$data['price'] = false;
		$data['price_list'] = false;
		$data['year'] = false;
		$data['addition'] = false;
		$data['brands'] = false;
		$data['products'] = [];
		$data['empty_text'] = '~The best things in life are worth waiting for~';
		$data['type'] = '';
		$data['types'] = null;
		$data['bold'] = false;
		$data['condition'] = true;
		switch ($request->subject) {
			case 'Guitar':
				if($request->ctg){
					$products = Product::whereHas('category', function ($p) use ($request){
						$p->where('name', $request->ctg);
					})->whereNull('status');
					if($request->condition){
						$products->where('condition', $request->condition);
					}
		
					if($request->type){
						$products->where('type' , $request->type);
					}
		
					if($request->from_price || $request->to_price){
						$products->where('sell_price', '>=', intval($request->from_price))->where('sell_price', '<=', intval($request->to_price));
					}
		
					if($request->up_to){
						$products->where('sell_price', '>=', intval($request->up_to));
					}
		
					if($request->from_year){
						$products->where('year','>=', $request->from_year)->where('year', '<=', $request->to_year);
					}
					if($request->up_year){
						$products->where('year', $request->up_year);
					}

					if($request->brd){
						$products->whereHas('brand', function ($c) use ($request){
							$c->where('name',$request->brd);
						});
					}
		
					
					// return $products->get();
					$data['products'] = $products->orderBy('name')->paginate(14);
				}
				
				
				else{
					$data['products'] = Product::whereNull('status')->paginate(14);
				}

				if($request->ctg == 'Electric Guitars'){
					$data['brands']  = ['Gibson','Fender','Gretsch','Rickenbacker','ESP','Ibanez','PRS','Epiphone'];
					$data['type']    = 'without acoustic';
				}elseif($request->ctg == 'Acoustic Guitars'){
					$data['brands'] =['Guild', 'Martin', 'Taylor', 'Epiphone', 'Kitharra'];
					$data['type'] = 'none';
				}
				$data['price']   = true;
				$data['year'] 	 = true;
				$data['empty_text'] = null;
				break;
			case 'Amplifiers':
				$data['brands'] = ['Marshall', 'Orange', 'Fender', 'Peavey', 'Positive Grid', 'VOX'];
				$data ['types'] = ['Tube-Valve', 'Solid-State'];
				$data['addition'] = ['Heads', 'Cabinets', 'Combos'];
				$data['year'] = true;
				$data['price']= true;
				$data['col'] = 'col-md-3';
				$data['image'] = 'img-pedals';
				break;
			case 'Effect Pedals':
				$data['brands'] = [ 'Big Muff','Boss','Earthquaker Devices','Ibanez','Jim Dunlop','Marshall','MXR','Polytune','Strymon','TC Electronics' ,'VOX' ,'Wampler' ,'Waza Craft'];
				$data['types']= ['Chorus','Delay', 'Distortion', 'Flanger', 'Fuzz', 'Noise Gate', 'Octave', 'Overdrive', 'Phaser', 'Reverb', 'Tremolo', 'Tuner', 'Volume', 'Wah', 'Combo'];
				$data['col'] = 'col-md-3';
				$data['image'] = 'img-pedals';
				$data['price_list'] = true;
				break;
			case 'Vintage Stuff':
				$data['brands'] = ['Gibson', 'Fender', 'Rickenbacker', 'Gretsch', 'Danelectro', 'Epiphone', 'Supro', 'VOX', 'Marshall', 'Other'];
				$data['addition'] = ['Hang Tags', 'Brochures', 'Pamphlets', "Owner's Manuals", 'Warranty Cards', 'Distributor Fliers', 'Banners', 'Concert Tickets', 'Polishes-Cloths', 'Case Candies', 'Vintage Parts'];
				$data['col'] = 'col-md-3';
				$data['price_list'] = true;
				$data['image'] = 'img-pedals';
				$data['condition'] = false;
				break;
			case 'Merch-Apparel':
				$data['types'] = ['Hats', 'Bandanas', 'Batik Stuff', 'Key Chains', 'Phone Covers', 'Pick Cases', 'Pick Trays', 'Stickers', 'Gift Certificate', 'Other'];
				$data['type'] = 'none';
				$data['bold'] = true;
				$data['condition'] = false;
				break;
			case 'Parts-Accessories':
				$data['types'] = ['Axe Stands', 'Amp Stands', 'Handmade Straps', 'Straplocks', 'Plectrums', 'Cables-Connectors', 'Cleaning-Polishing', 'Pickguards', 'Replacements Parts', 'Pontiometers', 'Capacitors', 'Strings', 'Gift Certificates', 'Other'];
				$data['type'] = 'none';
				$data['bold'] = false;
				$data['title'] = 'Parts/Accessories';
				$data['condition'] = false;
				break;
			case 'Exotic-Instruments':
				$data['types'] = ['Angklung', 'Calung', 'Gambus', 'Gamelan' , 'Gamelan Melayu', 'Gamelan Jaipong', 'Gong', 'Kecapi', 'Kolintang', 'Saluang-Suling', 'Sasando', 'Teyhan-Rebab'];
				$data['bold'] = true;
				$data['price'] = true;
				$data['condition'] = false;
				break;
			default:
				if($request->ctg){
					$products = Product::whereHas('category', function ($p) use ($request){
						$p->where('name', $request->ctg);
					})->whereNull('status')->orderBy('name_2', 'ASC')->paginate(15);
					if($request->condition){
						$products->where('condition', $request->condition);
					}
		
					if($request->type){
						$products->where('type' , $request->type);
					}
		
					if($request->from_price || $request->to_price){
						$products->where('sell_price', '>=', intval($request->from_price))->where('sell_price', '<=', intval($request->to_price));
					}
		
					if($request->up_to){
						$products->where('sell_price', '>=', intval($request->up_to));
					}
		
					if($request->from_year){
						$products->where('year','>=', $request->from_year)->where('year', '<=', $request->to_year);
					}
					if($request->up_year){
						$products->where('year', $request->up_year);
					}
					// $data['products'] = $products->orderBy('name')->paginate(14);
				}
				
				
				else{
					$data['products'] = Product::whereNull('status')->paginate(14);
				}

				if($request->ctg == 'Electric Guitars'){
					$data['brands']  = ['Gibson','Fender','Gretsch','Rickenbacker','ESP','Ibanez','PRS','Epiphone'];
					$data['type']    = 'without acoustic';
				}elseif($request->ctg == 'Acoustic Guitars'){
					$data['brands'] =['Guild', 'Martin', 'Taylor', 'Epiphone', 'Kitharra'];
					$data['type'] = 'none';
				}
				$data['price']   = true;
				$data['year'] 	 = true;
				$data['empty_text'] = null;
				break;
		}
 
		$data['categories'] = Category::all();
		$data['ctg'] = $request->ctg;
		$data['subject']= $request->subject ?? 'Guitar';
		// return $data;
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
			$data['images'] = ProductImage::where('product_id', $product->id)->orderBy('id', 'ASC')->get();
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
