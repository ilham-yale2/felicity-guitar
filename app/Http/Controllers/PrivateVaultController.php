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
         // dd($request);
         DB::beginTransaction();
         try {
             // $product->type_id = $request->type_id;
             // $product->subcategory_id = $request->sub_id;
             $product = new PrivateVault();
             $product->code = $request->code;
             $product->brand_id = $request->brand_id;
             $product->category_id = $request->category_id;
             $product->name = $request->name;
             $product->slug = Str::slug($request->name);
             $product->text = $request->text;
             $price = $this->replaceDot($request->price);
             $product->price = $price;
             $product->discount = $request->discount;
             $product->sell_price = $price - ($price * $request->discount / 100);
             $fileName = 'private-vault/thumbnail/' . Str::slug($request->name) . time() . '.' . $request->thumbnail->extension();
             $image = Image::make($request->thumbnail);
             $image->resize(500, null, function ($constraint) {
                 $constraint->aspectRatio();
             });
             Storage::put($fileName, (string) $image->encode());
             $product->thumbnail = $fileName;
             $product->save();
             
             if ($request->images) {
                 foreach ($request->images as $key => $item) {
                     $fileName = 'private-vault/product/' . $this->makeCode(Str::slug($request->name), 4) . '.jpg';
 
                     $img = Image::make($item);
                     $img->resize(500, null, function ($constraint) {
                         $constraint->aspectRatio();
                     });
                     Storage::put($fileName, (string) $img->encode());
 
                     PrivateVaultImage::create(
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
 
             PrivateVaultDetail::create($data);
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
        $detail  = PrivateVaultDetail::where('product_id', $id)->first();
        if($detail){
            $data['detail'] = $detail;
        }else{
            $detail = new PrivateVaultDetail();
            $detail->product_id = $id;
            $detail->save();
            $data['detail'] = $detail;
        }
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
            $product->slug = Str::slug($request->name);
            $product->text = $request->text;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->sell_price = $request->price - ($request->price * $request->disc / 100);
            if($request->file('thumbnail')){
                if($this->existsFile($product->thumbnail)){
                    Storage::delete($product->thumbnail);
                }
                $fileName = 'private-vault/thumbnail/' . Str::slug($request->name) . time() . '.' . $request->thumbnail->extension();
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
                    $fileName = 'private-vault/product/' . $this->makeCode(Str::slug($product->name), 4) . '.jpg';
                    $img = Image::make($item);
                    $img->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    Storage::put($fileName, (string) $img->encode());

                    PrivateVaultImage::create(
                        [
                            'product_id' => $product->id,
                            'image' => $fileName,
                        ]
                    );
                }
            }
            $detail = PrivateVaultDetail::where('product_id', $id);
            $detail->update($request->except(['_method', '_token','code', 'name', 'category_id', 'brand_id', 'price', 'sell_price','discount','text', 'zero-config_length', 'thumbnail', 'images', 'sold']));
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
}
