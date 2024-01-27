<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
	protected $fillable = [
        'po_no',
        'product_id',
        'brand_id',
        'item_name',
        'condition',
        'condition_updated_by',
        'condition_updated_timestamp',
        'items_remaining',
        'lower_limit',
        'created_by',
        'isActive',
        'created_time_stamp',
    ];

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function categoryData()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productData()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function getIsActiveProductAttribute()
    {
        $status = [
            1 =>'Active',
            2 => 'Deactivated',
            3 => 'Deleted',
            // Add more roles as needed
        ];

        return $status[$this->attributes['isActive']] ?? 'Unknown Status';
    }
}
