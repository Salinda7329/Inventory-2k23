<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id',
        'paid_by',
        'bill_id',
        'amount',
        'created_at',
        'updated_at',
        'isactive',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'payment_id';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user who made the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'paid_by');
    }

    /**
     * Get the bill associated with the payment.
     */
    public function bill()
    {
        return $this->belongsTo(Bills::class, 'bill_id');
    }

    // Add any additional relationships or methods as needed
}
