<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use App\Donation;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $active_campaigns_count = Campaign::active_campaigns_count();
        $donations_to_be_verified_count = Donation::donations_to_be_verified_count();
        $users_count = User::users_count();
        
        return view('admin.pages.dashboard', compact('active_campaigns_count', 'donations_to_be_verified_count', 'users_count'));
    }
}
