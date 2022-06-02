<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('user.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = User::find($id);
        return view('user.edit', $data);
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
            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            if($request->file('avatar')){
                if($this->existsFile($user->avatar) && $user->avatar != '/user/user.png'){
                    Storage::delete($user->avatar);
                }
                $fileName = '/user/' . $this->makeCode(Str::slug($user->name), 4) .'.' . $request->avatar->extension();
                $img = Image::make($request->avatar);

                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put($fileName, (string) $img->encode());
                $user->avatar = $fileName;
            }
            $user->save();
            DB::commit();
            $message = [
                'status' => 'success',
                'text' => 'Success to update user',
                'data' => [
                    'data' => User::find($id),
                ]
            ];
    
            return redirect()->route('user.index')->with(['message' => $message]);

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
        $message = [
            'status' => 'success',
            'text' => 'Success to delete user',
            'data' => [
                'data' => User::find($id),
            ]
        ];

        return redirect()->route('user.index')->with(['message' => $message]);
    }
}
