<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
	protected $fillable = [
        'brand_name',
        'created_by',
        'created_at',
        'updated_at',
        'isactive',
    ];
}
