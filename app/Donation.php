<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Donation extends Model implements HasMedia
{
    use HasMediaTrait;
    
    /*
    payment_method:
        1 => GCash
        2 => PayMaya
    
    status:
        0 => For Verification
        1 => Invalid
        2 => Verified
    */
    
    protected $fillable = [
        'campaign_id', 'user_id', 'first_name', 'last_name', 'is_anonymous', 'amount', 'payment_method'
    ];
    
    public static function fetch_all() {
        return Donation::select('id', 'campaign_id', 'user_id', 'first_name', 'last_name', 'is_anonymous', 'amount', 'payment_method', 'status', 'created_at')
            ->with('campaign')
            ->orderBy('id', 'desc')
            ->get();
    }
    
    public function campaign() {
        return $this->belongsTo('App\Campaign')
            ->select('id', 'first_name', 'last_name');
    }
    
    public static function donations_to_be_verified_count() {
        return Donation::where('status', 0)
            ->count();
    }
}
