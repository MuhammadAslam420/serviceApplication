<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'utype',
        'code',
        'discount_amount',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
