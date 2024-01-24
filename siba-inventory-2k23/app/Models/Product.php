<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'po_no',
        'category_id',
        'product_name',
        'created_by',
        // ... other attributes
    ];
}
