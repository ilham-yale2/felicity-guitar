<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\PrivateVault;
use App\Http\Controllers\Controller;
use App\PrivateVaultDetail;
use App\PrivateVaultImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class PrivateVaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data['menu'] = 'vault';
        $data['page'] = 'list pivate';
        $data['products'] = PrivateVault::all();
        
        return view('private-vault.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = 'vault';
        $data['page'] = 'list private';
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        return view('private-vault.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->images){
            if(count($request->images) > 10){
                return redirect()->back()->with('images', 'Maximum upload 10 files');
            }
        }
         DB::beginTransaction();
         try {
             // $product->type_id = $request->type_id;
             // $product->subcategory_id = $request->sub_id;
             $product = new PrivateVault();
             $product->code = $this->makeCode('PRV', 10);
             $product->brand_id = $request->brand_id;
             $product->category_id = $request->category_id;
             $product->meta_text = $request->meta_text;
             $product->name = $request->name;
             $product->name_2 = $request->name_2;
             $product->slug = Str::slug($request->name);
             $product->text = $request->text;
             $product->alt_text = $request->alt_text;
             $product->description = $request->description;
             $price = $this->replaceDot($request->price);
             $product->price = $price;
             $product->discount = $request->discount;
             $product->sell_price = $price - ($price * $request->discount / 100);
             $fileName = 'private-vault/thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail->extension();
             $image = Image::make($request->thumbnail);
            //  $image->resize(500, null, function ($constraint) {
            //      $constraint->aspectRatio();
            //  });
             Storage::put($fileName, (string) $image->encode());
             $product->thumbnail = $fileName;

             $fileThumbnail = 'private-vault/thumbnail/' . Str::slug($request->name) . $this->makeCode(5) .'.'. $request->thumbnail_2->extension();
             $thumbnail = Image::make($request->thumbnail_2);
            //  $thumbnail->resize(500, null, function($constraint){
            //     $constraint->aspectRatio();
            //  });

             Storage::put($fileThumbnail, (string) $thumbnail->encode());
             $product->thumbnail_2 = $fileThumbnail;

             $product->save();
             
             if ($request->images) {
                 foreach ($request->images as $key => $item) {
                     $fileName = 'private-vault/product/' . $this->makeCode(Str::slug($request->name), 4) . '.jpg';
 
                     $img = Image::make($item);
                    //  $img->resize(500, null, function ($constraint) {
                    //      $constraint->aspectRatio();
                    //  });
                     Storage::put($fileName, (string) $img->encode());
 
                     PrivateVaultImage::create(
                         [
                             'product_id' => $product->id,
                             'image' => $fileName,
                         ]
                     );
                 }
             }
 

             if($request->type){

                 foreach($request->type as $key => $item){
                    $detail = new PrivateVaultDetail();
                    $detail->product_id = $product->id;
                    $detail->type = $request->type[$key];
                    $detail->title = $request->title[$key];
                    $detail->value = $request->value[$key];
                    $detail->save();
                }
             }
             DB::commit();
 
             $status = [
                 'status' => 'success',
                 'text' => 'Success to add product',
                 'data' => [
                     'product' => $product,
                 ]
             ];
 
             return redirect()->route('vault.index')->with(['message' => $status]);
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
 
             return redirect()->route('vault.index')->with(['message' => $status]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrivateVault  $privateVault
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['menu'] = 'vault';
        $data['page'] = 'list product';
        $data['brands'] = Brand::all();
        $data['product'] = PrivateVault::find($id);
        $data['general']  = PrivateVaultDetail::where('product_id', $id)->where('type', 'general')->get();
        $data['body']  = PrivateVaultDetail::where('product_id', $id)->where('type', 'body')->get();
        $data['neck']  = PrivateVaultDetail::where('product_id', $id)->where('type', 'neck')->get();
        $data['hardware']  = PrivateVaultDetail::where('product_id', $id)->where('type', 'hardware')->get();
        $data['miscellaneous']  = PrivateVaultDetail::where('product_id', $id)->where('type', 'miscellaneous')->get();
        $data['electronic']  = PrivateVaultDetail::where('product_id', $id)->where('type', 'electronic')->get();
        $data['product_images'] = PrivateVaultImage::whereProductId($id)->get();
        $data['categories'] = Category::all();
        return view('private-vault.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrivateVault  $privateVault
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivateVault $privateVault)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrivateVault  $privateVault
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->images){
            if(count($request->images) > 10){
                return redirect()->back()->with('images', 'Maximum upload 10 files');
            }
        }
        DB::beginTransaction();

        try {
            $product = PrivateVault::find($id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            // $product->category = $request->category;
            $product->description = $request->description;
            if($request->sold){
                $product->status = 'sold';
            }
            $product->name = $request->name;
            $product->name_2 = $request->name_2;
            $product->meta_text = $request->meta_text;
            $product->slug = Str::slug($request->name);
            $product->text = $request->text;
            $product->alt_text = $request->alt_text;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->sell_price = $request->price - ($request->price * $request->disc / 100);
            if($request->file('thumbnail')){
                if($this->existsFile($product->thumbnail)){
                    Storage::delete($product->thumbnail);
                }
                $fileName = 'private-vault/thumbnail/' . Str::slug($request->name) . time() . '.' . $request->thumbnail->extension();
                $image = Image::make($request->thumbnail);
                // $image->resize(500, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // });
                Storage::put($fileName, (string) $image->encode());
                $product->thumbnail = $fileName;
            }
            if($request->file('thumbnail_2')){
                if($this->existsFile($product->thumbnail_2)){
                    Storage::delete($product->thumbnail_2);
                }
                $file = 'private-vault/thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail_2->extension();
                $img = Image::make($request->thumbnail_2);
                // $img->resize(500, null, function($constraint){
                //     $constraint->aspectRatio();
                // });
                Storage::put($file, (string) $img->encode());
                $product->thumbnail_2 = $file;

            }
            $product->save();
            if ($request->images) {
                foreach ($request->images as $key => $item) {
                    $fileName = 'private-vault/product/' . $this->makeCode(Str::slug($product->name), 4) . '.jpg';
                    $img = Image::make($item);
                    // $img->resize(500, null, function ($constraint) {
                    //     $constraint->aspectRatio();
                    // });
                    Storage::put($fileName, (string) $img->encode());

                    PrivateVaultImage::create(
                        [
                            'product_id' => $product->id,
                            'image' => $fileName,
                        ]
                    );
                }
            }

            if ($request->old_id) {
                foreach($request->old_id as $key => $item){
                    $detail = PrivateVaultDetail::where('id', $request->old_id[$key])->first();
                    $detail->value = $request->old_value[$key];
                    $detail->title = $request->old_title[$key];
                    $detail->save();
                }
            }

            if($request->title){
                foreach($request->title as $key => $item){
                    $detail = new PrivateVaultDetail();
                    $detail->value = $request->value[$key];
                    $detail->title = $request->title[$key];
                    $detail->type = $request->type[$key];
                    $detail->product_id = $product->id;
                    $detail->save();
                }
            }
            // $detail = PrivateVaultDetail::where('product_id', $id);
            // $detail->update($request->except(['_method', '_token','thumbnail_2','code', 'name', 'category_id', 'brand_id', 'price', 'sell_price','discount','text', 'zero-config_length', 'thumbnail', 'images', 'sold']));
            DB::commit();

            $status = [
                'status' => 'success',
                'text' => 'Success to Update Product',
                'data' => [
                    'product' => $product,
            ]
            ];

            return redirect()->route('vault.index')->with(['message' => $status]);
        } catch (\Throwable$th) {
            DB::rollback();
            throw $th;

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];

            return redirect()->route('vault.index')->with($status);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrivateVault  $privateVault
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product_images = PrivateVaultImage::whereProductId($id)->get();
        // foreach ($product_images as $product_image) {
        //     if($this->existsFile($product_image)){
        //         Storage::delete($product_image->image);
        //     }
        //     $product_image->delete();
        // }

        $product = PrivateVault::find($id);
        if($this->existsFile($product->thumbnail)){
            Storage::delete($product->thumbnail);
            Storage::delete($product->thumbnail_2);
        }
        $images = PrivateVaultImage::where('product_id', $product->id);

        if(count($images->get()) > 0){
            foreach($images as $img ){

                Storage::delete($img->image);
                $img->delete();
            }
        }

        $product->delete();
        $status = [
            'status' => 'success',
            'text' => 'Success to delete Product',
            
            ];
        return redirect()->back()->with('message', $status);
 
    }
    public function deleteImage(Request $request){
        DB::commit();
        try {
            $image = PrivateVaultImage::find($request->id);
            // return $image;
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
