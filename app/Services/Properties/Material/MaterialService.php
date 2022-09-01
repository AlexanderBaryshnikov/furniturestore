<?php

namespace App\Services\Properties\Material;

use App\Models\Offer;
use App\Models\PropertyValue;

class MaterialService
{
    public static function getMaterials(Offer $offer)
    {
        return PropertyValue::whereIn('id', self::getMaterialIds($offer))->get() ?? [];
    }

    private static function getMaterialIds(Offer $offer)
    {
        $materials = $offer->materials()->get();

        return $materials->map(function ($material) {
            return $material->pivot->property_value_id;
        });
    }
}
