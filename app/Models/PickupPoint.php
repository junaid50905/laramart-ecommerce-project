<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupPoint extends Model
{
    use HasFactory;
    protected $table = 'pickup_point_names';
    protected $fillable = [
        'name',
        'address',
        'main_phone',
        'alternative_phone',
    ];

    public function products()
    {
        return $this->hasMany(AllProduct::class);
    }
}
