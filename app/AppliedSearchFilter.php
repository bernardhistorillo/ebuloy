<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppliedSearchFilter extends Model
{
    protected $fillable = [
        'campaign_id', 'search_filter_id'
    ];
    
    public function search_filter() {
        return $this->belongsTo('App\SearchFilter');
    }
}
