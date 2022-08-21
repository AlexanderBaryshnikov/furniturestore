<?php

namespace App\Services\Pages;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferService
{
    private Offer $offer;

    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }

    public function getData(): array
    {
        return [
            'offer' => $this->offer,
            'offer_id' => $this->offer->id
        ];
    }
}
