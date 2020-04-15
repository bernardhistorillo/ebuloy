<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class CampaignsController extends Controller
{
    public function index() {
        $campaigns = Campaign::admin_fetch_all();
        $campaign = null;
        
        return view('admin.pages.campaigns', compact('campaigns', 'campaign'));
    }
    
    public function view($id) {
        try {
            $campaign_id = Crypt::decryptString($id);
        } catch (\Exception $e) {
            abort(404);
        }
        
        $campaign = Campaign::admin_fetch($campaign_id);
        
        return view('admin.pages.campaigns', compact('campaign'));
    }
}
