<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use App\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationsController extends Controller
{
    public function update_status(Request $request) {
        $response['error'] = '';
        
        Donation::where('id', $request->id)
            ->update([
                'status' => $request->status
            ]);
        
        $donation = Donation::find($request->id);
        
        $response['total_donations'] = number_format(Campaign::find($donation['campaign_id'])->total_donations(), 2);
        $response['content'] = (string)view('admin.partials.donation-action-buttons', compact('donation'));
        
        return $response;
    }
}
