<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	protected $fillable = [
        'category_id',
        'product_name',
        'created_by',
        'created_at',
        'updated_at',
        'isactive',
    ];
}
