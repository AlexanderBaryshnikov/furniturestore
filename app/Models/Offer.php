<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Offer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'properties',
        'sku',
        'price',
        'quantity'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['product.name', 'sku']
            ]
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getAllPropertiesList()
    {
        return self::parseProperties(self::getAllProperties());
    }

    public static function parseProperties(string $properties = '')
    {
        $property_values = Str::replace(['[', '"', ']'], '', $properties);

        return collect(explode(',', $property_values));
    }

    public static function getAllProperties(int $product_id = 0): string
    {
        $builder = self::select('properties');

        if ($product_id) {
            $builder->where('product_id', $product_id);
        }

        $properties = $builder->get();

        if (!$properties->count()) {
            return '';
        }

        $p = $properties->map(function ($property) {
            return $property->properties;
        });

        return implode(',',$p->toArray());
    }
}
