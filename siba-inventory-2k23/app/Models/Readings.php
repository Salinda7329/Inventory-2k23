<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Readings extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rid',
        'meter_id',
        'reading',
        'created_at',
        'updated_at',
        'isactive',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'rid';

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
     * Get the meter associated with the reading.
     */
    public function meter()
    {
        return $this->belongsTo(Meters::class, 'meter_id');
    }

    // Add any additional relationships or methods as needed
}
