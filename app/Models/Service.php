<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'title','slug','description','price','discount','image','gallery','city','zipcode','state','address',
        'service_type_id','country_id','category_id','sub_category_id','featured','status','lat','lng','top','approved','type',
        'position','vip','views','duration','video_link'
    ];
    public static function searchServices($title, $city, $category_id, $service_type_id, $advance_sorting, $minprice, $maxprice, $sorting,$perPage)
    {
        $query = self::where('status', 'active')
            ->where('approved', 'yes');

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($city) {
            $query->where('city', 'like', '%' . $city . '%');
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($service_type_id) {
            $query->where('service_type_id', $service_type_id);
        }

        if ($advance_sorting) {
            $query->where('featured', $advance_sorting);
        }

        if ($minprice || $maxprice) {
            $query->whereBetween('price', [$minprice, $maxprice]);
        }

        if ($sorting === 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sorting === 'desc') {
            $query->orderBy('price', 'desc');
        } else {
            // Default sorting (add any default sorting logic here)
            $query->orderBy('position', 'asc')->orderBy('price', 'asc');
        }

        return $query->paginate($perPage);
    }

    public function subcat()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function cat()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }
    public function availabilties()
    {
        return $this->hasMany(ServiceAvailability::class);
    }
    public function additionals()
    {
        return $this->hasMany(AdditionalService::class);
    }

}
