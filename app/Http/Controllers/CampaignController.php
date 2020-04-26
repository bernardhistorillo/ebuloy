<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Donation;
use App\SearchFilter;
use Illuminate\Http\Request;
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
    
    public function donate($id, Request $request) {
        $response["error"] = "";
        
        $campaign_id = Crypt::decryptString($id);
        
        $request->validate([
            'amount' => 'required|numeric|gt:0',
            'tip' => 'required|numeric|gt:19'
        ]);
        
        if(!in_array($request->payment_method, ['gcash', 'paymaya'])) {
            $response['error'] = 'Select a method on how you will send your donation.';
            return $response;
        }
        
        $request->request->add([
            'campaign_id' => $campaign_id,
            'payment_method' => ($request->payment_method == 'gcash') ? 1 : (($request->payment_method == 'paymaya') ? 2 : 0)
        ]);
        
        if(!$request->file('screenshot')) {
            $response['error'] = 'Please attach a screenshot of your ' . (($request->payment_method == 'gcash') ? 'GCash' : (($request->payment_method == 'paymaya') ? 'PayMaya' : '')) . ' transaction.';
            return $response;
        }
        
        if($request->donor_info == 'input') {
            $request->validate([
                'first_name' => 'max:191',
                'last_name' => 'max:191'
            ]);
        } else if($request->donor_info == 'account') {
            if(Auth::check()) {
                $request->request->add([
                    'user_id' => Auth::user()->id,
                    'first_name' => Auth::user()->first_name,
                    'last_name' => Auth::user()->last_name
                ]);
            } else {
                $response['error'] = 'Please login your account.';
                return $response;
            }
        } else if($request->donor_info == 'anonymous') {
            $request->request->add([
                'is_anonymous' => 1
            ]);
        }
        
        $donation = Donation::create($request->except(['screenshot']));
    
        $donation->addMediaFromUrl($request->file('screenshot'))->toMediaCollection('screenshots');
        
        return $response;
    }
}
