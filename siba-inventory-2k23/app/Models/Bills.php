<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_id',
        'AccNo',
        'start_time',
        'end_time',
        'units',
        'fee',
        'bill_settled',
        'created_at',
        'updated_at',
        'isactive',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'bill_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the account associated with the bill.
     */
    public function account()
    {
        return $this->belongsTo(Accounts::class, 'AccNo');
    }

    // Add any additional relationships or methods as needed
}
