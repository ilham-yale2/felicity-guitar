<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Str;
use Image;
use Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands']  =  Brand::all();
        return view('brand.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
            $brand = new Brand();
            $brand->name = $request->brand_name;
            $fileName = 'brand/' . Str::slug($request->name) . time() . '.' . $request->image->extension();
            $image = Image::make($request->image);
            // $image->resize(100, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // });
            Storage::put($fileName, (string) $image->encode());
            $brand->image = $fileName;
            $brand->save();
            $msg = [
                'status' => 'success',
                'text' => 'Success to add brand',
                'data' => $brand
            ];
            DB::commit();
            return redirect()->route('brand.index')->with(['message' => $msg]);
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
        $data['brand'] = Brand::find($id);
        return view('brand.edit', $data);
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
        DB::beginTransaction();
        try {
            $brand = Brand::find($id);
            $brand->name = $request->brand_name;
            if($request->file('image')){
                if($this->existsFile($brand->image)){
                    Storage::delete($brand->image);
                }
                $fileName = 'brand/' . Str::slug($request->name) . time() . '.' . $request->image->extension();
                $image = Image::make($request->image);
                // $image->resize(00, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // });
                Storage::put($fileName, (string) $image->encode());
                $brand->image = $fileName;
            }
            $brand->save();
            $status = [
                'status' => 'success',
                'text' => 'Success to save brand',
                'data' => $brand
            ];
            DB::commit();
            return redirect()->route('brand.index')->with(['message' => $status]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $brand = Brand::find($id)->delete();
            $status = [
                'status' => 'success',
                'text' => 'Success to delete Brand',
                'data' => $brand
            ];
            DB::commit();
            return redirect()->route('brand.index')->with(['message' => $status]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
