<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Storage;
use Str;

class UserController extends Controller
{
    public function index()
    {
        $data['menu'] = 'user';
        $data['page'] = 'user';
        $data['users'] = User::all();

        return view('user.index', $data);
    }

    public function profile()
    {
        $data['menu'] = '';
        $data['page'] = '';
        return view('user.profile', $data);
    }

    public function create()
    {
        $data['menu'] = 'user';
        $data['page'] = 'user';

        return view('user.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->owner = $request->owner;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->email = 'okok';
            $user->save();

            $file = $request->file('logo');
            $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

            $image = Image::make($file);
            $image->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::put('user/' . $fileName, (string) $image->encode());
            $image_path = 'user/' . $fileName;

            $user->update(
                [
                    'logo' => $image_path,
                ]
            );

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];
        } catch (\Throwable$th) {
            throw $th;
        }

        return redirect()->route('user.index')->with($status);
    }

    public function show($id)
    {
        $data['menu'] = 'user';
        $data['page'] = 'user';
        $data['user'] = User::find($id);
        return view('user.edit', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        try {
            $user = User::find(Auth::guard('user')->user()->id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            if($request->file != null){
                if(Auth::guard('user')->user()->avatar != '/user/user.png'){
                    Storage::delete(Auth::guard('user')->user()->avatar);
                }
                $fileName = '/user/' . $this->makeCode(Str::slug($user->name), 4) . '.jpg';
                // return $fileName;
                $img = Image::make($request->file);
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put($fileName, (string) $img->encode());

                $user->avatar = $fileName;
            }
            $user->save();

            $status = [
                'status' => 'success',
                'text' => 'Success to update account',
                'data' => $user
            ];
            return redirect()->back()->with(['message' => $status]);
        } catch (\Throwable$th) {
            throw $th;
        }

        return redirect()->route('user.index')->with($status);
    }

    public function profileUpdate(Request $request, $id)
    {
        try {
            $user = Admin::find($id);
            $user->name = $request->name;
            $user->owner = $request->owner;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->username = $request->username;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            if ($request->file('logo')) {
                Storage::delete($user->logo);
                $file = $request->file('logo');
                $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

                $image = Image::make($file);
                $image->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                Storage::put('user/' . $fileName, (string) $image->encode());
                $image_path = 'user/' . $fileName;

                $user->update(
                    [
                        'logo' => $image_path,
                    ]
                );
            }

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];
        } catch (\Throwable$th) {
            throw $th;
        }

        return redirect()->back()->with($status);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        Storage::delete($user->logo);
        $user->delete();

        $status = [
            'status' => 'success',
            'msg' => 'Data berhasil di hapus',
        ];

        return redirect()->route('user.index')->with($status);
    }

    public function logout( Request $request )
    {
        if(Auth::guard('user')->check())
        {
            Auth::guard('user')->logout();
            return redirect()->route('index');
        }

        $this->guard('user')->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
