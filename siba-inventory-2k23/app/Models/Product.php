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

    /**
     * A description of the createdByUser PHP function.
     *
     * @return BelongsTo
     */
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function categoryData()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
