<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index() {
        $tags = Campaign::tags();
        return view('pages.campaigns', compact('tags'));
    }
}
