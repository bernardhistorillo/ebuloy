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
    */
    
    protected $fillable = [
        'campaign_id', 'user_id', 'first_name', 'last_name', 'is_anonymous', 'amount', 'payment_method'
    ];
    
}
