<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    protected $table = 'website_settings';
    protected $fillable = [
        'currency',
        'phone_one',
        'phone_two',
        'main_mail',
        'support_mail',
        'logo',
        'favicon',
        'address',
        'facebook_link',
        'instragram_link',
        'twitter_link',
        'youtube_link'
    ];
}
