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
            'offer_id' => $this->offer->id,
            'reviews' => $this->getReviews(),
            'breadcrumbs' => \Breadcrumbs::render('offers.page', $this->offer) ?? ''
        ];
    }

    private function getReviews()
    {
        $per_page = 2;
        return $this->offer->reviews()->published()->paginate($per_page);
    }
}
