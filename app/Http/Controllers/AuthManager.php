<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\EmailVerificationMail;



class AuthManager extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect(route('home'));  
        }
        return view('login'); 
    }

    function registration(){
        if (Auth::check()){
            return redirect(route('home'));  
        }
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'  
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route(name:'login'))->with("error", "Invalid login details");
    }
    
    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:100',
            'terms' => 'required',
          
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'email_verification_code'=> Str::random(40),
            'password'=> Hash::make($request->password)
        ]);
    
        Mail::to($user->email)->send(new EmailVerificationMail($user));

        return redirect()->back()->with("success", "Registration success, Please check your email address for email verification link.");
        }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route(name:'login'));
    }
    public function verifyEmail($verification_code) {
        $user=User::where('email_verification_code', $verification_code)->first();
        if(!$user){
            return redirect()->route(name:'registration')->with('error', 'Invalid URL');
        }
        else {
            if($user->email_verified_at) {
                return redirect()->route(name:'registration')->with('error', 'Email already verified');
            }
            else {

                $user->update([
                    'email_verified_at'=>\Carbon\Carbon::now()
                ]);

                return redirect()->route(name:'registration')->with('success', 'Email successfully verified');

            }
        }
    }
}
