<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Room extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'type',
        'capacity',
        'bed',
        'bathroom',
        'kitchen',
        'description',
        'price',
        'tax',
        'status',
        'features',
        'created_by',
        'modified_by',
        'image'
    ];

    /**
     * Get the image associated with the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(Image::class);
    }

   
}
