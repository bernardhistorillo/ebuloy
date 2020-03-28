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
    
    public static function tags() {
        return [
          'Male', 'Female', 'Children', 'Adult', 'Age 60+', 'Veteran', 'Politician', 'Hero', 'Public Figure'
        ];
    }
}
