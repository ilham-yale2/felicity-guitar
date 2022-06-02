<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistration;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class AuthUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login()
    {
		return view('login');
    }

    public function submitLogin(Request $request){
        // return $request->all();
        $user = User::where('email', $request->email)->first();
        if($user){ 
           if($user->email_verified_at){
                if (Auth::guard('user')->attempt($request->only(['email', 'password']))) {
                    Auth::guard('user')->login($user, true);
                    return redirect()->route('index');

                } else {
                    $message = [
                        'status' => 'error',
                        'text' => 'Your Password are wrong',
        
                    ];
                    return redirect()->back()->with(['message' => $message]);
                }
           }else{
            $message = [
                'status' => 'error',
                'text' => 'Your account is not verified',

            ];
            return redirect()->back()->with(['message' => $message]);
           }
        }else{
            $message = [
                'status' => 'error',
                'text' => 'Your Email are wrong',

            ];
            return redirect()->back()->with(['message' => $message]);
        }
    }

    public function submitRegistration(Request $request){
        // return $request->all();
        $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'name' => 'required'
        ]);
		try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            if($request->receive_email){
                $user->receive_email = $request->receive_email;
            }else{
                $user->receive_email = 0;
            }
            $user->remember_token = Str::random(60);
            $user->save();
            Mail::to($user->email)->send(new UserRegistration($user->remember_token, $user->name, $user->email));
            $message = [
                'status' => 'success',
                'text' => 'Check your mail for finish the registration',

            ];
            return redirect()->back()->with('message', $message);
        } catch (\Throwable $th) {
            throw $th;
        }

	}
	public function registration()
	{
		return view('registration');
	}

    public function verify(Request $request){
        $user = User::where('email', $request->email)->where('remember_token', $request->code)->first();
        if($user){
            
            if(!$user->email_verified_at){
                $user->email_verified_at = Carbon::now();
                $user->save();
                $message = [
                    'status' => 'success',
                    'text' => 'Your account has been successfully verified, You can login now',

                ];
            }else{
                $message = [
                    'status' => 'warning',
                    'text' => 'Your account has been verified',

                ];
            }
            return redirect()->route('sign-in')->with('message', $message);
        }else{
            abort(404);
        }
    }
}
