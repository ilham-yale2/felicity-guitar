<?php

namespace App\Http\Controllers;

use App\UserTrade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserTradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['trades'] = UserTrade::all();
        return view('trade.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $trade = new UserTrade();
            $trade->name = $request->name;
            $trade->email = $request->email;
            $trade->phone = $request->phone;
            $trade->city = $request->city;
            $trade->piece_of_gear = $request->piece_of_gear;
            $trade->gear_type = $request->gear_type;
            $trade->make = $request->make;
            $trade->model = $request->model;
            $trade->condition = $request->condition;
            $trade->serial_number = $request->serial_number;
            $trade->case_include = $request->case_include;
            $trade->description_problem = $request->description_problem;
            $trade->description_modification = $request->description_modification;
            $trade->information = $request->information;
            $trade->url = $request->url;

            $file = array();
            $i = 0;
            foreach ($request->file as $key => $value) {
                if($value != null){
                    $fileName = '/trade/' . $this->makeCode(Str::slug($trade->name), 12) .'.jpg';
                    // return $fileName;
                    $img = Image::make($request->file[$i]);

                    $img->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    Storage::put($fileName, (string) $img->encode());
                }
                $i++;
                array_push($file , $fileName);
            }
            $trade->images = $file;

            $trade->save();
            $message = [
                'status' => 'success',
                'text' => 'Success to submit ',
            ];
            DB::commit();
            return redirect()->route('private-vaulte')->with('message', $message);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserTrade  $userTrade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['trade'] = UserTrade::find($id);
        return view('trade.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTrade  $userTrade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTrade  $userTrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTrade $userTrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTrade  $userTrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTrade $userTrade)
    {
        //
    }
}
