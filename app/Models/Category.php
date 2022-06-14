<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

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
        $query->where('parent_id', '!=', 0);
    }
}
