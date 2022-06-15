<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function values()
    {
        return $this->hasMany(PropertyValue::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_property')->withPivot('property_value_id');
    }
}
