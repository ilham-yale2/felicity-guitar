<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('password.index');
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
        $user = User::where('email',$request->email)->first();
        if($user){
            if ($user->email_verified_at != null) {
                
                Mail::to($user->email)->send(new ForgotPassword($user->remember_token, $user->email, $user->name));
                $message = [
                    'status' => 'success',
                    'text' => 'Check Your Email for confirm Passrowd reset'
                ];
                return redirect()->back()->with('message', $message);
            } else {
                $message = [
                    'status' => 'error',
                    'text' => 'Your email is not verified'
                ];
                return redirect()->back()->with('message', $message);
            }
        }else{
            $message = [
                'status' => 'error',
                'text' => 'your account could not be found'
            ];
            return redirect()->back()->with('message', $message);
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
        //
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
    public function update(Request $request)
    {
        $data['user'] = $request;
        return view('password.form', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reset(Request $request){
        $this->validate($request, [
            'code' => 'required',
            'email' => 'required',
            'password' =>'min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:8'
        ]);
        $user = User::where('remember_token', $request->code)->where('email', $request->email)->first();
        if($user){
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(60);
            $user->save();

            $message = [
                'status' => 'success',
                'text' => 'Success to reset password'
            ];
            return redirect()->route('sign-in')->with('message', $message); 
        }else{
            
            return redirect()->back()->withErrors('These credentials do not match our records');     
        }
    }
}
