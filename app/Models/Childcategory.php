<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;
    protected $table = 'childcategories';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_name',
        'childcategory_slug',
    ];

    //relationships
    public function subcategory()
    {
        return $this->belongsTo(subcategory::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
