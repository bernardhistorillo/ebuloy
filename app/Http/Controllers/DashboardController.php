<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.dashboard');
    }
    
    public function edit_account(Request $request) {
        $response["error"] = "";
        
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email_address' => 'required|email|max:191',
            'mobile_number' => 'required|digits:11',
            'address' => 'required'
        ]);
        
        if(Auth::user()->manual_login) {
            $request->validate([
                'password' => 'required|alpha_num|min:6|max:191',
                'confirm_password' => 'required|same:password|max:191'
            ]);
            
            $request->request->add([
                'password' => Hash::make($request->password),
                'is_manual_login' => 1
            ]);
        }
        
        $user = User::updateOrCreate(['id' => Auth::user()->id], $request->except('confirm_password'));
        
        if($request->file('image')) {
            $user->addMediaFromUrl($request->file('image'))->toMediaCollection('display_photos');
        }
    
        Auth::user()->refresh();
        
        $response['account_content'] = (string)view('partials.account-content');
        $response['edit_account_modal_content'] = (string)view('partials.edit-account-modal-content');
        
        return $response;
    }
}
