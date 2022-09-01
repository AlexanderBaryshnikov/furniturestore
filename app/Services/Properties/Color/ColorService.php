<?php

namespace App\Services\Properties\Color;

use App\Models\Offer;

class ColorService
{
    private static array $colors = [
            1 => '#FFFFFF',
            2 => '#000000',
            6 => '#A9A9A9',
            7 => '#808080',
            9 => '#70442d',
        ];

    public static function getColorValue(int $id = 0)
    {
        return self::$colors[$id] ?? null;
    }

    public static function getColors($offers)
    {
        return $offers->mapWithKeys(function ($offer) {
            return [$offer->slug => self::getColorId($offer)];
        });
    }

    private static function getColorId(Offer $offer)
    {
        return $offer->colors->map(function ($color) {
            return $color->pivot->property_value_id;
        });
    }
}
