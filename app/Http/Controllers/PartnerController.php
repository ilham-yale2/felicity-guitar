<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['partners'] = Partner::all();
        return view('partner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partner.create');
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
            $partner = new Partner();
            $partner->name = $request->name;
            $partner->phone = $request->phone;
            $partner->email = $request->email;
            $partner->description = $request->description;
            
            $fileName = 'partner/' . Str::slug($request->name) . time() . '.' . $request->image->extension();
            $image = Image::make($request->image);
            $image->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put($fileName, (string) $image->encode());
            $partner->image = $fileName;
            $partner->save();
            $message = [
                'status' => 'success',
                'text' => 'Success to Add Partner',
            ];
            DB::commit();
            return redirect()->route('partner.index')->with('message', $message);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['partner'] = Partner::find($id);
        return view('partner.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $partner =  Partner::find($id);
            $partner->name = $request->name;
            $partner->phone = $request->phone;
            $partner->email = $request->email;
            $partner->description = $request->description;
            
            if($request->image){
                if($this->existsFile($partner->image)){
                    Storage::delete($partner->image);
                }
                $fileName = 'partner/' . Str::slug($request->name) . time() . '.' . $request->image->extension();
                $image = Image::make($request->image);
                $image->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                Storage::put($fileName, (string) $image->encode());
                $partner->image = $fileName;
            }
            $partner->save();
            $message = [
                'status' => 'success',
                'text' => 'Success to Edit Partner',
            ];
            DB::commit();
            return redirect()->route('partner.index')->with('message', $message);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
