<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\SearchFilter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CampaignController extends Controller
{
    public function index($id = null) {
        $campaign = null;
        
        if($id) {
            $id = Crypt::decryptString($id);
        
            $campaign = Campaign::where('id', $id)
                ->first();
            
            if($campaign) {
                $in_public_campaigns = true;
                
                return view('pages.campaigns', compact('campaign', 'in_public_campaigns'));
            } else {
                return redirect()->route('campaigns');
            }
        }
        
        $search_filters = SearchFilter::all();
        $campaigns = Campaign::fetch_all();
        $locations = Campaign::locations();
        
        return view('pages.campaigns', compact('search_filters', 'campaign', 'campaigns', 'locations'));
    }
}
