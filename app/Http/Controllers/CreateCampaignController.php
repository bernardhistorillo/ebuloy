<?php

namespace App\Http\Controllers;

use App\AppliedSearchFilter;
use App\Campaign;
use App\SearchFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CreateCampaignController extends Controller
{
    public function index($id = null) {
        $campaign = null;
        
        if($id) {
            $id = Crypt::decryptString($id);
            
            $campaign = Campaign::where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
            
            if(!$campaign) {
                return redirect()->route('create-campaign');
            }
        }
        
        $search_filters = SearchFilter::all();
        
        return view('pages.create-campaign', compact('campaign', 'search_filters'));
    }
    
    public function submit(Request $request) {
        $response["error"] = "";
    
        if($request->is_draft == 0) {
            if($request->id) {
                $campaign = Campaign::where('id', $request->id)
                    ->where('user_id', Auth::user()->id)
                    ->first();
                
                if($campaign) {
                    if(!$campaign->hasMedia('deceased_photos')) {
                        if(!$request->file('image')) {
                            $response['error'] = "Please include a photo of the deceased.";
                            return $response;
                        }
                    }
    
                    if(!$campaign->hasMedia('cover_photos')) {
                        if(!$request->file('cover_photo')) {
                            $response['error'] = "Please include a cover photo of the deceased.";
                            return $response;
                        }
                    }
                } else {
                    return redirect()->route('create-campaign');
                }
            } else {
                if(!$request->file('image')) {
                    $response['error'] = "Please include a photo of the deceased.";
                    return $response;
                }
    
                if(!$request->file('cover_photo')) {
                    $response['error'] = "Please include a cover photo of the deceased.";
                    return $response;
                }
            }
        }
        
        if($request->is_draft == 1) {
            $request->validate([
                'first_name' => 'max:191',
                'last_name' => 'max:191',
                'date_of_birth' => 'nullable|date',
                'date_of_death' => 'nullable|date|after:date_of_birth|before_or_equal:today',
                'funeral' => 'max:191',
                'start_of_campaign' => 'nullable|date',
                'end_of_campaign' => 'nullable|date|after:start_of_campaign|after_or_equal:today',
                'street' => 'max:191',
                'city' => 'max:191',
                'province' => 'max:191',
                'postal_code' => 'max:191',
                'story' => 'nullable',
                'image' => 'nullable|image',
                'cover_photo' => 'nullable|image'
            ]);
        } else {
            $request->validate([
                'first_name' => 'required|max:191',
                'last_name' => 'required|max:191',
                'date_of_birth' => 'required|date',
                'date_of_death' => 'required|date|after:date_of_birth|before:tomorrow',
                'funeral' => 'required|max:191',
                'start_of_campaign' => 'required|date',
                'end_of_campaign' => 'required|date|after:start_of_campaign|after_or_equal:today',
                'street' => 'required|max:191',
                'city' => 'required|max:191',
                'province' => 'required|max:191',
                'postal_code' => 'required|max:191',
                'story' => 'required',
                'image' => 'nullable|image',
                'cover_photo' => 'nullable|image'
            ]);
        }
        
        $request->request->add([
            'user_id' => Auth::user()->id
        ]);
    
        $campaign_id = null;
        if($request->id) {
            $campaign = Campaign::where('id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->first();
            
            $campaign_id = ($campaign) ? $request->id : null;
        }
        
        $campaign = Campaign::updateOrCreate(['id' => $campaign_id], $request->except(['id', 'image']));
        
        if($request->file('image')) {
            $campaign->addMediaFromUrl($request->file('image'))->toMediaCollection('deceased_photos');
        }
    
        if($request->file('cover_photo')) {
            $campaign->addMediaFromUrl($request->file('cover_photo'))->toMediaCollection('cover_photos');
        }
    
        AppliedSearchFilter::where('campaign_id', $campaign->id)
            ->delete();
    
        $search_filters = json_decode($request->search_filters, true);
        
        foreach($search_filters as $search_filter) {
            AppliedSearchFilter::create([
                'campaign_id' => $campaign->id,
                'search_filter_id' => $search_filter,
            ]);
        }
        
        $response['route'] = route('dashboard');
        
        return $response;
    }
}
