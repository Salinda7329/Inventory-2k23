<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id_user',
        'quantity_user',
        'user_remark',
        'request_by',
        'requested_timestamp',
        'type',
        'status',
        'item_id',
        'quantity',
        'sm_remark',
        'store_manager',
        'store_manager_timestamp',
        'isActive',
    ];
}
