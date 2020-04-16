<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        $campaigns = Auth::user()->campaigns();
        
        foreach($campaigns as $i => $campaign) {
            $start_of_campaign = Carbon::parse($campaign['start_of_campaign']);
            $end_of_campaign = Carbon::parse($campaign['end_of_campaign']);
            
            $donations = [];
            $graph_labels = [];
            $graph_data = [];
            
            foreach($campaign['donations'] as $donation) {
                array_push($donations, [
                    'date' =>  Carbon::parse($donation['created_at'])->format('Y-m-d'),
                    'amount' => $donation['amount']
                ]);
            }
            
            while($start_of_campaign <= $end_of_campaign) {
                $date = $start_of_campaign->format('Y-m-d');
    
                $amount = 0;
                foreach($donations as $donation) {
                    if($donation['date'] == $date) {
                        $amount += $donation['amount'];
                    }
                }
                
                array_push($graph_labels, $start_of_campaign->format('j M'));
                array_push($graph_data, $amount);
    
                $start_of_campaign->add('1 day');
            }
    
            $campaigns[$i]['graph_labels'] = $graph_labels;
            $campaigns[$i]['graph_data'] = $graph_data;
        }
        
        return view('pages.dashboard', compact('campaigns'));
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
