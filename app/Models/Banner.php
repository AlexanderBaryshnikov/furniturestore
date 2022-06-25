<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    const TYPE_HOME = 'home';
    const TYPE_PRODUCT = 'product';

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'link',
        'btn_text'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('banners');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banners')
            ->singleFile();
    }

    public function scopeHome($query)
    {
        return $query->where('type', self::TYPE_HOME);
    }

    public function scopeProduct($query)
    {
        return $query->where('type', self::TYPE_PRODUCT);
    }
}
