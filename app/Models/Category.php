<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'parent_id',
        'is_subcategory'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('category');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category');
    }

    public static function categoriesList()
    {
        $subcategories = self::subcategory()
            ->with('products')
            ->whereHas('products', function (Builder $query) {
                return $query->published()
                    ->with('offers')
                    ->whereHas('offers', function (Builder $query) {
                        return $query->published();
                    });
            })
            ->get();

        $categories = self::parentCategory()
            ->with('products')
            ->whereHas('products', function (Builder $query) {
                return $query->published()
                    ->with('offers')
                    ->whereHas('offers', function (Builder $query) {
                        return $query->published();
                    });
            })
            ->orWhereIn('id', $subcategories->map(function ($subcategory) { return $subcategory->parent_id; }))
            ->get();

        foreach ($categories as $category) {
            if ($subcategories->contains('parent_id', $category->id)) {
                $category['subcategories'] = $subcategories->where('parent_id', $category->id);
            }
        }

        return $categories;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSubcategory($query)
    {
        $query->where('is_subcategory', true);
    }

    public function scopeNotSubcategory($query)
    {
        $query->where('is_subcategory', false);
    }

    public function scopeParentCategory($query)
    {
        $query->where('parent_id', 0);
    }
}
