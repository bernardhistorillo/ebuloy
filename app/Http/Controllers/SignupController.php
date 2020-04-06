<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SignupController extends Controller
{
    public function index() {
        return view("pages.signup");
    }
    
    public function form() {
        if(Auth::check()) {
            if(!Auth::user()->first_name || !Auth::user()->last_name || !Auth::user()->mobile_number || !Auth::user()->email_address) {
                return view("pages.signup-form");
            } else {
                return redirect()->route('dashboard');
            }
        }
        
        return view("pages.signup-form");
    }
    
    public function submit_form(Request $request) {
        if(Auth::check()) {
            if(Auth::user()->first_name && Auth::user()->last_name && Auth::user()->mobile_number && Auth::user()->email_address) {
                return redirect()->route('dashboard');
            }
        }
        
        $response["error"] = "";
        
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email_address' => 'required|email|max:191',
            'mobile_number' => 'required|digits:11'
        ]);
        
        $user_id = null;
        
        if(Auth::check()) {
            $user_id = Auth::user()->id;
        } else {
            $request->validate([
                'password' => 'required|alpha_num|min:6|max:191',
                'confirm_password' => 'required|same:password|max:191'
            ]);
    
            $request->request->add([
                'password' => Hash::make($request->password),
                'is_manual_login' => 1
            ]);
        }
        
        $user = User::updateOrCreate(['id' => $user_id], $request->except('confirm_password'));
    
        if(!Auth::check()) {
            Auth::loginUsingId($user->id, true);
        }
        
        return $response;
    }
    
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function handleFacebookCallback(Request $request)
    {
        $facebook_user = Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email'
        ])->stateless()->user();
    
        $user = User::select('id')
            ->where('facebook_id', $facebook_user->getId())->first();
        
        if(!$user) {
            $user = User::create([
                'facebook_id' => $facebook_user->getId(),
                'email_address' => $facebook_user->getEmail(),
                'first_name' => $facebook_user->user['first_name'],
                'last_name' => $facebook_user->user['last_name']
            ]);
    
            $user->addMediaFromUrl($facebook_user->getAvatar())->toMediaCollection('display_photos');
        }
        
        Auth::loginUsingId($user->id, true);
        
        return redirect()->route('dashboard');
    }
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback(Request $request)
    {
        $google_user = Socialite::driver('google')->user();
        
        $user = User::select('id')
            ->where('google_id', $google_user->getId())->first();
        
        if(!$user) {
            $user = User::create([
                'google_id' => $google_user->getId(),
                'email_address' => $google_user->getEmail(),
                'first_name' => $google_user->user["given_name"],
                'last_name' => $google_user->user["family_name"]
            ]);
            
            $user->addMediaFromUrl($google_user->getAvatar())->toMediaCollection('display_photos');
        }
        
        Auth::loginUsingId($user->id, true);
        
        return redirect()->route('dashboard');
    }
}
