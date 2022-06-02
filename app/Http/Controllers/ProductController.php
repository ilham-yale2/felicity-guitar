<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Type;
use App\User;
use App\Product;
use App\Category;
use App\ProductData;
use App\Subcategory;
use App\ProductImage;
use App\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data['menu'] = 'product';
        $data['page'] = 'list product';
        $data['products'] = Product::all();

        return view('product.index', $data);
    }

    public function create()
    {
        $data['menu'] = 'product';
        $data['page'] = 'list product';
        // $data['types'] = Type::all();
        // $data['users'] = User::all();
        // $data['users'] = User::all();
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();

        return view('product.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            // $product->type_id = $request->type_id;
            // $product->subcategory_id = $request->sub_id;
            $product = new Product();
            $product->code = $request->code;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->text = $request->text;
            $price = $this->replaceDot($request->price);
            $product->price = $price;
            $product->discount = $request->discount;
            $product->sell_price = $price - ($price * $request->discount / 100);
            $fileName = 'thumbnail/' . Str::slug($request->name) . time() . '.' . $request->thumbnail->extension();
            $image = Image::make($request->thumbnail);
            $image->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put($fileName, (string) $image->encode());
            $product->thumbnail = $fileName;
            $product->save();
            
            if ($request->images) {
                foreach ($request->images as $key => $item) {
                    $fileName = 'product/' . $this->makeCode(Str::slug($request->name), 4) . '.jpg';

                    $img = Image::make($item);
                    $img->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    Storage::put($fileName, (string) $img->encode());

                    ProductImage::create(
                        [
                            'product_id' => $product->id,
                            'image' => $fileName,
                        ]
                    );
                }
            }

            // detail

            $data = $request->all();
            $data['product_id'] = $product->id;

            ProductDetail::create($data);
            DB::commit();

            $status = [
                'status' => 'success',
                'text' => 'Success to add product',
                'data' => [
                    'product' => $product,
                ]
            ];

            return redirect()->route('product.index')->with(['message' => $status]);
        } catch (\Throwable$th) {
            DB::rollback();
            throw $th;

            $status = [
                'status' => 'success',
                'text' => 'Failed to add product',
                'data' => [
                    'product' => $product,
                ]
            ];

            return redirect()->route('product.index')->with(['message' => $status]);
        }
    }

    public function show($id)
    {
        $data['menu'] = 'product';
        $data['page'] = 'list product';
        $data['brands'] = Brand::all();
        $data['product'] = Product::find($id);
        $detail  = ProductDetail::where('product_id', $id)->first();
        if($detail){
            $data['detail'] = $detail;
        }else{
            $detail = new ProductDetail();
            $detail->product_id = $id;
            $detail->save();
            $data['detail'] = $detail;
        }
        $data['product_images'] = ProductImage::whereProductId($id)->get();
        $data['categories'] = Category::all();
        $data['subs'] = Subcategory::where('category_id', $data['product']->id)->get();
        $data['users'] = User::all();
        return view('product.edit', $data);

    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $product = Product::find($id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            // $product->category = $request->category;
            $product->description = $request->description;
            if($request->sold){
                $product->status = 'sold';
            }
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->text = $request->text;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->sell_price = $request->price - ($request->price * $request->disc / 100);
            if($request->file('thumbnail')){
                if($this->existsFile($product->thumbnail)){
                    Storage::delete($product->thumbnail);
                }
                $fileName = 'thumbnail/' . Str::slug($request->name) . time() . '.' . $request->thumbnail->extension();
                $image = Image::make($request->thumbnail);
                $image->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put($fileName, (string) $image->encode());
                $product->thumbnail = $fileName;
            }
            $product->save();
            if ($request->images) {
                foreach ($request->images as $key => $item) {
                    $fileName = 'product/' . $this->makeCode(Str::slug($product->name), 4) . '.jpg';
                    $img = Image::make($item);
                    $img->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    Storage::put($fileName, (string) $img->encode());

                    ProductImage::create(
                        [
                            'product_id' => $product->id,
                            'image' => $fileName,
                        ]
                    );
                }
            }
            $detail = ProductDetail::where('product_id', $id);
            $detail->update($request->except(['_method','description','sold', '_token','code', 'name', 'category_id', 'brand_id', 'price', 'sell_price','discount','text', 'zero-config_length', 'thumbnail', 'images']));
            DB::commit();

            $status = [
                'status' => 'success',
                'text' => 'Success to Update Product',
                'data' => [
                    'product' => $product,
            ]
            ];

            return redirect()->route('product.index')->with(['message' => $status]);
        } catch (\Throwable$th) {
            DB::rollback();
            throw $th;

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];

            return redirect()->route('product.index')->with($status);
        }
    }

    public function destroy($id)
    {
        $product_images = ProductImage::whereProductId($id)->get();
        foreach ($product_images as $product_image) {
            if($this->existsFile($product_image)){
                Storage::delete($product_image->image);
            }
            $product_image->delete();
        }

        $product = Product::find($id);
        if($this->existsFile($product->thumbnail)){
            Storage::delete($product->thumbnail);
        }
        $images = ProductImage::where('product_id', $product->id);

        if(count($images->get()) > 0){
            foreach($images as $img ){

                Storage::delete($img->image);
                $img->delete();
            }
        }

        $product->delete();
        $data = ProductData::find(1);
        // $data->terjual = Product::where('sold', 1)->count();
        // $data->total = Product::all()->count();
        $data->save();
        $status = [
            'status' => 'success',
            'text' => 'Success delete data',
            'data' => [
                'product' => $product,
            ]
        ];

        return redirect()->route('product.index')->with(['message' => $status]);
    }

    public function imageDestroy(Request $request)
    {
        $image = ProductImage::find($request->id);
        Storage::delete($image->image);
        $image->delete();

        return response()->json($image);
    }

    public function detailDestroy(Request $request)
    {
        $detail = ProductDetail::find($request->id);
        $detail->delete();

        return response()->json($detail);
    }

    public function category($id)
    {
        $category = Category::where('type_id', $id)->get();

        return response()->json($category);
    }

    public function subcategory($id)
    {
        // dd($id);
        // $subcategory = Subcategory::where('category_id', $id)->get();
        $data = ProductData::find('1');
        if ($id == 'atas') {
            $code = 'A' . $data->atas + 1;
        }elseif ($id == 'bawah') {
            $code = 'B' . $data->bawah + 1;
        }
        

        return response()->json($code);
    }

    public function getCode(){
        $code = $this->makeCode('PRD', 10);
        return response()->json($code);
    }
    public function deleteImage(Request $request){
        DB::commit();
        try {
            $image = ProductImage::find($request->id);
            if($this->existsFile($image->image)){
                Storage::delete($image->image);
                $image->delete();
                $status = [
                    'type' => 'success',
                    'text' => 'Success delete image',
                    'data' => [
                        'product' => $image,
                    ]
                ];
            }
            return response()->json($status);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
