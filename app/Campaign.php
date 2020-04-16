<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Campaign extends Model implements HasMedia
{
    use HasMediaTrait;
    
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'date_of_birth', 'date_of_death', 'funeral', 'start_of_campaign', 'end_of_campaign', 'street', 'city', 'province', 'postal_code', 'story', 'is_draft'
    ];
    
    public function search_filters() {
        return $this->hasMany('App\AppliedSearchFilter')->select('search_filter_id')->pluck('search_filter_id')->all();
    }
    
    public static function fetch_all() {
        return Campaign::where('is_draft', 0)
            ->where('end_of_campaign', '>=', Carbon::today())
            ->get();
    }
    
    public static function locations() {
        return Campaign::select('city')
            ->where('is_draft', 0)
            ->where('end_of_campaign', '>=', Carbon::today())
            ->groupBy('city')
            ->orderBy('city', 'asc')
            ->pluck('city')
            ->all();
    }
    
    public static function admin_fetch_all() {
        return Campaign::select('id', 'first_name', 'last_name', 'date_of_birth', 'date_of_death', 'funeral', 'start_of_campaign', 'end_of_campaign', 'created_at')
            ->where('is_draft', 0)
            ->get();
    }
    
    public static function admin_fetch($id) {
        return Campaign::where('is_draft', 0)
            ->where('id', $id)
            ->with('user')
            ->with('donations')
            ->with('applied_search_filters.search_filter')
            ->first();
    }
    
    public function user() {
        return $this->belongsTo('App\User')->select('id', 'first_name', 'last_name');
    }
    
    public function donations() {
        return $this->hasMany('App\Donation')
            ->select('id', 'campaign_id', 'user_id', 'first_name', 'last_name', 'is_anonymous', 'amount', 'payment_method', 'status', 'created_at')
            ->orderBy('id', 'desc');
    }
    
    public function applied_search_filters() {
        return $this->hasMany('App\AppliedSearchFilter');
    }
    
    public function total_donations() {
        return $this->hasMany('App\Donation')
            ->where('status', 2)
            ->sum('amount');
    }
    
    public static function active_campaigns_count() {
        return Campaign::where('is_draft', 0)
            ->where('end_of_campaign', '>=', Carbon::today())
            ->count();
    }

}
