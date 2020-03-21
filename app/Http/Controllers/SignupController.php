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
        return view("pages.signup-form");
    }
    
    public function submit_form(Request $request) {
        $response["error"] = "";
        
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email_address' => 'required|email|max:191',
            'mobile_number' => 'required|digits:11'
        ]);
        
        if($request->id == null) {
            $request->validate([
                'password' => 'required|alpha_num|min:6|max:191',
                'confirm_password' => 'required|same:password|max:191'
            ]);
    
            $request->request->add([
                'password' => Hash::make($request->password),
                'is_manual_login' => 1
            ]);
        }
        
        $user = User::updateOrCreate($request->except('confirm_password'));
        Auth::loginUsingId($user->id);
        
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
    
        Auth::loginUsingId($user->id);
        
        return route('dashboard');
    }
}
