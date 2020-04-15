<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;
    
    protected $fillable = [
        'first_name', 'last_name', 'mobile_number', 'email_address', 'address', 'password', 'is_manual_login', 'facebook_id', 'google_id',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function campaigns() {
        return $this->hasMany('App\Campaign')->get();
    }
    
    public function admin_campaigns() {
        return $this->hasMany('App\Campaign')
            ->select('id', 'first_name', 'last_name', 'date_of_birth', 'date_of_death', 'funeral', 'start_of_campaign', 'end_of_campaign', 'created_at')
            ->where('is_draft', 0)
            ->get();
    }
    
    public function admin_donations() {
        return $this->hasMany('App\Donation')
            ->select('id', 'campaign_id', 'user_id', 'first_name', 'last_name', 'is_anonymous', 'amount', 'payment_method', 'status', 'created_at')
            ->with('campaign')
            ->orderBy('id', 'desc')
            ->get();
    }
    
    public static function fetch_all() {
        return User::where('role', 0)
            ->orderBy('first_name', 'asc')
            ->get();
    }
    
    public static function users_count() {
        return User::where('role', 0)
            ->count();
    }
}
