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
        if($request->images){
            if(count($request->images) > 10){
                return redirect()->back()->with('images', 'Maximum upload 10 files');
            }
        }


        DB::beginTransaction();
        try {
            $product = new Product();
            $product->code = $this->makeCode('PRD', 10);
            $product->meta_text = $request->meta_text;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->name = $request->name;
            $product->name_2 = $request->name_2;
            $product->slug = Str::slug($request->name);
            $product->text = $request->text;
            $price = $this->replaceDot($request->price);
            $product->price = $price;
            $product->discount = $request->discount;
            $product->sell_price = $price - ($price * $request->discount / 100);
            $fileName = 'thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail->extension();
            $image = Image::make($request->thumbnail);
            Storage::put($fileName, (string) $image->encode());
            $product->thumbnail = $fileName;

            $thumbnail_2 = 'thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail_2->extension();
            $image = Image::make($request->thumbnail_2);
            Storage::put($thumbnail_2, (string) $image->encode());
            $product->thumbnail_2 = $thumbnail_2;


            $product->save();
            
            if ($request->images) {
                foreach ($request->images as $key => $item) {
                    $fileName = 'product/' . $this->makeCode(Str::slug($request->name), 4) . '.jpg';

                    $img = Image::make($item);
                    // $img->resize(1000, null, function ($constraint) {
                    //     $constraint->aspectRatio();
                    // });
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

            foreach($request->type as $key => $item){
                $detail = new ProductDetail();
                $detail->product_id = $product->id;
                $detail->type = $request->type[$key];
                $detail->title = Str::lower($request->title[$key]);
                $detail->value = $request->value[$key];
                $detail->save();
            }
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
        $data['general']  = ProductDetail::where('product_id', $id)->where('type', 'general')->get();
        $data['body']  = ProductDetail::where('product_id', $id)->where('type', 'body')->get();
        $data['neck']  = ProductDetail::where('product_id', $id)->where('type', 'neck')->get();
        $data['hardware']  = ProductDetail::where('product_id', $id)->where('type', 'hardware')->get();
        $data['miscellaneous']  = ProductDetail::where('product_id', $id)->where('type', 'miscellaneous')->get();
        $data['electronic']  = ProductDetail::where('product_id', $id)->where('type', 'electronic')->get();
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
        
        if($request->images){
            if(count($request->images) > 10){
                return redirect()->back()->with('images', 'Maximum upload 10 files');
            }
        }

        DB::beginTransaction();
        
        try {
            
            $product = Product::find($id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->description = $request->description;
            if($request->sold){
                $product->status = 'sold';
            }
            $product->name = $request->name;
            $product->name = $request->name_2;
            $product->meta_text = $request->meta_text;
            $product->slug = Str::slug($request->name);
            $product->text = $request->text;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->sell_price = $request->price - ($request->price * $request->disc / 100);
            if($request->file('thumbnail')){
                if($this->existsFile($product->thumbnail)){
                    Storage::delete($product->thumbnail);
                }
                $fileName = 'thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail->extension();
                $image = Image::make($request->thumbnail);
                Storage::put($fileName, (string) $image->encode());
                $product->thumbnail = $fileName;
            }
            if($request->file('thumbnail_2')){
                if($this->existsFile($product->thumbnail_2)){
                    Storage::delete($product->thumbnail_2);
                }
                $thumbnail_2 = 'thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail_2->extension();
                $image = Image::make($request->thumbnail_2);
                Storage::put($thumbnail_2, (string) $image->encode());
                $product->thumbnail_2 = $thumbnail_2;
            }
           
            $product->save();
            if ($request->images) {
                foreach ($request->images as $key => $item) {
                    $fileName = 'product/' . $this->makeCode(Str::slug($product->name), 4) . '.jpg';
                    $img = Image::make($item);
                    // $img->resize(1000, null, function ($constraint) {
                    //     $constraint->aspectRatio();
                    // });
                    Storage::put($fileName, (string) $img->encode());

                    ProductImage::create(
                        [
                            'product_id' => $product->id,
                            'image' => $fileName,
                        ]
                    );
                }
            }
            if($request->old_id){
                foreach($request->old_id as $key => $item){
                    $detail = ProductDetail::where('id', $request->old_id[$key])->first();
                    $detail->value = $request->old_value[$key];
                    $detail->title = $request->old_title[$key];
                    $detail->save();
                }
            }

            if($request->title){
                foreach($request->title as $key => $item){
                    $detail = new ProductDetail();
                    $detail->value = $request->value[$key];
                    $detail->title = $request->title[$key];
                    $detail->type = $request->type[$key];
                    $detail->product_id = $product->id;
                    $detail->save();
                }
            }
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

    public function deleteDetail(Request $request){
        try {
            $detail = ProductDetail::where('product_id', $request->product_id)->where('id', $request->id)->delete();
            $data = [
                'status' => 'success',
                'data' => $detail
            ];
            return response()->json($data);
        
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
