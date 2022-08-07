<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'color',
        'bg_color'
    ];

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'label_offer');
    }

    public function scopeNewLabel($query)
    {
        $query->where('name', 'new');
    }

    public function scopeSaleLabel($query)
    {
        $query->where('name', 'sale');
    }

    public function scopeRecommendLabel($query)
    {
        $query->where('name', 'recommend');
    }
}
