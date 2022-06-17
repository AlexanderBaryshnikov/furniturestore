<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

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
}
