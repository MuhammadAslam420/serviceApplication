<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function provider()
    {
        return $this->belongsTo(User::class,'provider_id','id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
