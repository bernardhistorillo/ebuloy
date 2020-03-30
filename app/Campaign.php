<?php

namespace App;

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
    
}
