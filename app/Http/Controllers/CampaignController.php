<?php

namespace App\Http\Controllers;

use App\SearchFilter;

class CampaignController extends Controller
{
    public function index() {
        $search_filters = SearchFilter::all();
        
        return view('pages.campaigns', compact('search_filters'));
    }
}
