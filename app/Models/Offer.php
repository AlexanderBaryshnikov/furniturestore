<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Builder;

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
        $this->addMediaCollection('offers');
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

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getTotalRating()
    {
        return ceil(Review::where([
            ['rating', '>', 0],
            ['offer_id', $this->id]
        ])
            ->published()
            ->avg('rating'));
    }
}
