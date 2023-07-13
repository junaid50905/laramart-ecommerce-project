<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug'];

    //relationships
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
    public function childcategories()
    {
        return $this->hasMany(Childcategory::class);
    }
    public function products()
    {
        return $this->hasMany(AllProduct::class, 'category_id', 'id');
    }

}
