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
        

        DB::beginTransaction();
        try {
            $product = new PrivateVault();
            $product->code = $this->makeCode('PRV', 10);
            $product->meta_text = $request->meta_text;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->name = $request->name;
            $product->name_2 = $request->name_2;
            $product->slug = Str::slug($request->name);
            $product->text = $request->text;
            $product->alt_text = $request->alt_text;
            $product->country = $request->country;
            $product->type = $request->type;
            $product->condition = $request->condition;
            $product->year = $request->year;
            $price = $this->replaceDot($request->price);
            $product->price = $price;
            $product->discount = $request->discount;
            $product->sell_price = $price - ($price * $request->discount / 100);
            $fileName = 'private-vault/thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail->extension();
            $image = Image::make($request->thumbnail);
            Storage::put($fileName, (string) $image->encode());
            $product->thumbnail = $fileName;

            $thumbnail_2 = 'private-vault/thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail_2->extension();
            $image = Image::make($request->thumbnail_2);
            Storage::put($thumbnail_2, (string) $image->encode());
            $product->thumbnail_2 = $thumbnail_2;


            $product->save();
            
            // detail

             $detail = new PrivateVaultDetail();
             $detail->product_id = $product->id;
             $detail->general = $request->general;
             $detail->body = $request->body;
             $detail->neck = $request->neck;
             $detail->hardware = $request->hardware;
             $detail->electronic = $request->electronic;
             $detail->miscellaneous = $request->miscellaneous;
             $detail->save();

            DB::commit();
            if($request->images){
                if(count($request->images) > 10){
                    $status = [
                        'icon' => 'error',
                        'title' => 'Oops ...!!' ,
                        'text' =>  'Maximum upload 10 files'
                    ];
                    return redirect()->route('vault.show', ['admin_private_vault' => $product->id])->with(['message' => $status]);
                }
                else{
                    foreach ($request->images as $key => $item) {
                        $fileName = 'private-vault/gallery/' . $this->makeCode(Str::slug($request->name), 4) . '.jpg';
    
                        $img = Image::make($item);
                        Storage::put($fileName, (string) $img->encode());
    
                        PrivateVaultImage::create(
                            [
                                'product_id' => $product->id,
                                'image' => $fileName,
                            ]
                        );
                    }
                }
            }

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
        $data['menu'] = 'product';
        $data['page'] = 'list product';
        $data['brands'] = Brand::all();
        $data['product'] = PrivateVault::find($id);
        $data['categories'] = Category::all();
        $data['product_images'] = PrivateVaultImage::whereProductId($id)->orderBy('id', 'ASC')->get();
        $detail = PrivateVaultDetail::where('product_id', $id)->first();
        if($detail){
            $data['detail'] = $detail;
        }else{
            $new = new PrivateVaultDetail();
            $new->product_id = $id;
            $new->save();
            $data['detail'] = $new;
        }
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
    public function update(Request $request, $id)
    { 
        
        DB::beginTransaction();
        
        try {
            
            $product = PrivateVault::find($id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->description = $request->description;
            $product->country = $request->country;
            $product->type = $request->type;
            $product->condition = $request->condition;
            $product->year = $request->year;
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
                $fileName = 'private-vault/thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail->extension();
                $image = Image::make($request->thumbnail);
                Storage::put($fileName, (string) $image->encode());
                $product->thumbnail = $fileName;
            }
            if($request->file('thumbnail_2')){
                if($this->existsFile($product->thumbnail_2)){
                    Storage::delete($product->thumbnail_2);
                }
                $thumbnail_2 = 'private-vault/thumbnail/' . Str::slug($request->name) . $this->makeCode(5) . '.' . $request->thumbnail_2->extension();
                $image = Image::make($request->thumbnail_2);
                Storage::put($thumbnail_2, (string) $image->encode());
                $product->thumbnail_2 = $thumbnail_2;
            }
           
            $product->save();

            $detail = PrivateVaultDetail::where('product_id', $product->id)->first();
            $detail->general = $request->general;
            $detail->body = $request->body;
            $detail->neck = $request->neck;
            $detail->hardware = $request->hardware;
            $detail->electronic = $request->electronic;
            $detail->miscellaneous = $request->miscellaneous;
            $detail->save();

            if ($request->images) {
                if(count($request->images) > 10){
                    $status = [
                        'icon' => 'error',
                        'title' => 'Oops ...!!' ,
                        'text' =>  'Maximum upload 10 files'
                    ];
                    return redirect()->back()->with(['message' => $status]);
                }else{
                foreach ($request->images as $key => $item) {
                    $fileName = 'private-vault/gallery/' . $this->makeCode(Str::slug($product->name), 4) . '.jpg';
                    $img = Image::make($item);
                    // $img->resize(1000, null, function ($constraint) {
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
            }
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
                'status' => 'error',
                'msg' => 'Failed to update product',
            ];

            return redirect()->route('product.index')->with($status);
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
