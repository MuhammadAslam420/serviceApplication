<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAvailability extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'day_from',
        'day_to',
        'time_from',
        'time_to',
        'off_day',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
