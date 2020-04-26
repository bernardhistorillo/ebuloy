<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index() {
        return view('admin.pages.settings');
    }
    
    public function change_password(Request $request) {
        $response['error'] = '';
        
        $current_password = User::select('password')
            ->where('id', Auth::user()->id)
            ->first();
        
        if(!Hash::check($request['current_password'], $current_password['password'])) {
            $response['error'] = 'Invalid current password';
            return $response;
        }
        
        $request->validate([
            'new_password' => 'required|alpha_num|min:6|max:191',
            'confirm_password' => 'required|same:new_password|max:191'
        ]);
    
        User::where('id', Auth::user()->id)
            ->update(['password' => Hash::make($request['new_password'])]);
        
        return $response;
    }
}
