<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['category_id', 'subcategory_id', 'childcategory_id', 'brand_id', 'pickup_point_id', 'flash_deal_id', 'admin_id', 'warehouse_id', 'name', 'code', 'unit', 'tags', 'purchase_price', 'selling_price', 'discount_price', 'stock_quantity', 'description', 'thumbnail', 'images', 'featured', 'today_deal', 'status', 'cash_on_delivery'];
}
