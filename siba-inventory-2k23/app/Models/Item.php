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
        'conditon_updated_timestamp',
        'items_remaining',
        'lower_limit',
        'created_by',
        'isActive',
        'created_time_stamp',
    ];
}
