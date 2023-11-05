<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sub_categories';
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function services()
    {
        return $this->HasMany(Service::class);
    }

}
