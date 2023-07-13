<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllProduct extends Model
{
    use HasFactory;
    protected $table = 'all_products';
    protected $fillable = ['category_id', 'subcategory_id', 'childcategory_id', 'brand_id', 'pickup_point_id', 'admin_id', 'warehouse_id', 'name', 'code', 'unit', 'tags', 'purchase_price', 'selling_price', 'discount_price', 'stock_quantity', 'description', 'thumbnail', 'featured', 'today_deal', 'status', 'cash_on_delivery'];


    //relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function childcategory()
    {
        return $this->belongsTo(Childcategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function tempImages()
    {
        return $this->hasMany(TempImage::class, 'product_id', 'id');
    }
    public function pickupPoint()
    {
        return $this->belongsTo(PickupPoint::class);
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

}
