<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table='settings';

    protected $fillable =[
        'app_name',
        'logo',
        'footer_logo',
        'favicon',
        'address',
        'facebook',
        'instagram',
        'tiktok',
        'snapchat',
        'whatsapp',
        'email',
        'mobile'
    ];
}
