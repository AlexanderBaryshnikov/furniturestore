<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Offer extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    use InteractsWithMedia;

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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('offers');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('offers')
            ->singleFile();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class, 'label_offer');
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'offer_property')->withPivot('property_value_id');
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
