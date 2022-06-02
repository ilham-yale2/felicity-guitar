<?php

namespace App\Http\Controllers;

use App\UserAddress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $address = new UserAddress();
            $address->user_id = Auth::guard('user')->user()->id;
            $address->title = $request->title;
            $address->name = $request->name_address;
            $address->street_address = $request->street_address;
            $address->sub_distric = $request->sub_distric;
            $address->city = $request->city;
            $address->province = $request->province;
            $address->country = $request->country;
            $address->postcode = $request->postcode;
            $address->save();
            DB::commit();
            $status = [
                'status' => 'success',
                'type' => 'save',
                'title' => 'Well done ...',
                'text' => 'Success to add Address',
                'data' => [
                    'address' => $address,
                ]
            ];
            return $status;
        } catch (\Throwable $th) {
            DB::rollBack();
            return throw $th;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       try {
           $address = UserAddress::find($id);
           return $address;
       } catch (\Throwable $th) {
           throw $th;
       } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAddress $userAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $address = UserAddress::find($id);
            $address->title = $request->title;
            $address->name = $request->name_address;
            $address->street_address = $request->street_address;
            $address->sub_distric = $request->sub_distric;
            $address->city = $request->city;
            $address->province = $request->province;
            $address->country = $request->country;
            $address->postcode = $request->postcode;
            $address->save();
            DB::commit();
            $message = [
                'status' => 'success',
                'type' => 'update',
                'title' => 'Well done ...',
                'text' => 'Success to update Address',
                'data' => [
                    'address' => $address,
                ]
            ];
            return $message;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserAddress  $userAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAddress $userAddress)
    {
        //
    }

    public function getAddress(Request $request){
        try {
            return UserAddress::where('id',$request->address)
                 ->where('user_id', Auth::guard('user')->user()->id)->first();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
