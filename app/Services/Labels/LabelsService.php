<?php

namespace App\Services\Labels;

use App\Models\Label;
use App\Models\Offer;
use Illuminate\Support\Collection;

class LabelsService
{
    public static function getOffersByLabel(Label $label, int $limit = 10): Collection
    {
        return Offer::with('labels')
            ->whereRelation(
            'labels', 'label_id', $label->id
        )
            ->limit($limit)
            ->get();
    }

}
