<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='categories';
    protected $fillable =[
        'name','slug','status','logo','overlay'
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
