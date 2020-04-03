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
            ->where('end_of_campaign', '>=', Carbon::now())
            ->get();
    }
    
    public static function locations() {
        return Campaign::select('city')
            ->where('is_draft', 0)
            ->where('end_of_campaign', '>=', Carbon::now())
            ->groupBy('city')
            ->orderBy('city', 'asc')
            ->pluck('city')
            ->all();
    }
}
