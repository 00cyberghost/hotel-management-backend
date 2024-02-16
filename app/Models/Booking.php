<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'checkin_date',
        'checkout_date',
        'no_of_persons',
        'status',
        'payment',
        'price',
        'notes',
        'booking_no',
        'booking_type',
        'booked_by',
        'modified_by'
    ];

    /**
     * Get the room that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(User::class);
    }
}
