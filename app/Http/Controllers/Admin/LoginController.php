<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()) {
            if(Auth::user()->role == 0) {
                Auth::logout();
            } else if(Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard');
            }
        }
        
        return view('admin.pages.login');
    }
    
    public function submit(Request $request) {
        $response['error'] = '';
        
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        if(!Auth::attempt(['username' => $request->username, 'password' => $request->password, 'role' => 1], true)) {
            $response['error'] = "Login credentials didn't match any account.";
        }
        
        $response['redirect'] = route('admin.dashboard');
        
        return $response;
    }
    
    public function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
