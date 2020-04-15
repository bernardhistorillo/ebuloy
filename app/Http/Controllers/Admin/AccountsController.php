<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AccountsController extends Controller
{
    public function index() {
        $users = User::fetch_all();
        $user = null;
        
        return view('admin.pages.accounts', compact('users', 'user'));
    }
    
    public function view($id) {
        try {
            $user_id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }
        
        $user = User::find($user_id);
        
        return view('admin.pages.accounts', compact('user'));
    }
}
