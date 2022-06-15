<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'product_property')->withPivot('property_value_id');
    }
}
