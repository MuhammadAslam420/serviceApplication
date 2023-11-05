<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasRoles;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'mobile',
        'utype',
        'whatsapp',
        'insta',
        'fb',
        'snapchat',
        'address',
        'city',
        'country',
        'password',
        'profile_photo_path',
        'online_status',
        'admin_approved'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function services()
    {
        return $this->hasMany(Service::class,'user_id');
    }
     public function reviews()
     {
        return $this->hasMany(Review::class);
     }
     public function bookings()
     {
        return $this->hasMany(Booking::class);
     }
     public function transactions()
     {
        return $this->hasMany(Transaction::class);
     }

     public function bookingItems()
     {
        return $this->hasMany(BookingItem::class,'provider_id');
     }
     public function package()
     {
        return $this->hasOne(Package::class);
     }
}
