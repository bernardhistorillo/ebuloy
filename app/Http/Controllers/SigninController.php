<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function index() {
        return view("pages.signin");
    }
    
    public function form() {
        return view("pages.signin-form");
    }
    
    public function submit_form(Request $request) {
        $response["error"] = "";
        
        $request->validate([
            'email_address' => 'required|email|max:191',
            'password' => 'required'
        ]);
        
        if(!Auth::attempt(['email_address' => $request->email_address, 'password' => $request->password, 'is_manual_login' => 1])) {
            $response['error'] = "Login credentials didn't match any account.";
        }
        
        $response['redirect'] = route('dashboard');
        
        return $response;
    }
}
