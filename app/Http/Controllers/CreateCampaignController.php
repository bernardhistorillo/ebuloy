<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateCampaignController extends Controller
{
    public function index() {
        return view('pages.create-campaign');
    }
}
