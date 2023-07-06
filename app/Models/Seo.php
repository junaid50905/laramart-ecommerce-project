<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $table = 'seos';
    protected $fillable = [
        'meta_title',
        'meta_author',
        'meta_description',
        'meta_tags',
        'meta_keywords',
        'google_varification',
        'google_analytics',
        'google_adsense',
        'alexa_varification'
    ];
}
