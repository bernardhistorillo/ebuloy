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
        if(!$request->has('code')) {
            return 'no code.';
        } else {
            $facebook_user = Socialite::driver('facebook')->fields([
                'first_name', 'last_name', 'email'
            ])->stateless()->user();
            
            $user["facebook_id"] = $facebook_user->getId();
            $user["avatar"] = $facebook_user->getAvatar();
            $user["email_address"] = $facebook_user->getEmail();
            $user["first_name"] = $facebook_user->user['first_name'];
            $user["last_name"] = $facebook_user->user['last_name'];
            
            return $user;
            
            if($facebook_user->getEmail()) {
                $email_exist = User::where([ ["email", "=", $facebook_user->getEmail()] ])->first();
                if(!$email_exist) {
                    $user = User::create([
                        'email' => $facebook_user->getEmail(),
                        'ip_address' => \Request::ip(),
                        'user_date_joined' => date('Y-m-d H:i:s'),
                        'token' => $this->generateCode(),
                        'referral_code' => $this->generateCode(8),
                        'password' => "",
                        'fb_login' => 1
                    ]);
                    
                    PersonalInformation::create([
                        'user_id' => $user->id,
                        'first_name' => $facebook_user->user["first_name"],
                        'middle_name' => (isset($facebook_user->user["middle_name"])) ? $facebook_user->user["middle_name"] : null,
                        'last_name' => $facebook_user->user["last_name"]
                    ]);
                    
                    $user->addMediaFromUrl($facebook_user->getAvatar())->toMediaCollection('images');
                    
                    auth()->loginUsingId($user->id);
                    return redirect()->route('subscriber.referral_code');
                } else {
                    auth()->loginUsingId($email_exist->id);
                    return redirect()->route('subscriber.dashboard');
                }
            } else {
                return 'Facebook account has no email address';
            }
        }
    }
}
