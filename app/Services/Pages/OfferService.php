<?php

namespace App\Services\Pages;

use App\Models\Offer;
use App\Services\Properties\Color\ColorService;
use App\Services\Properties\Material\MaterialService;
use Illuminate\Http\Request;

class OfferService
{
    public function __construct(
        private Offer $offer,
    ) {}

    public function getData(): array
    {
        return [
            'offer' => $this->offer,
            'offer_id' => $this->offer->id,
            'reviews' => $this->getReviews(),
            'breadcrumbs' => \Breadcrumbs::render('catalog.offer',  $this->offer->product->category, $this->offer->product, $this->offer) ?? '',
            'rating' => $this->offer->getTotalRating(),
            'colors' => ColorService::getColors($this->getProductOffers()) ?? [],
            'materials' => MaterialService::getMaterials($this->offer) ?? []
        ];
    }

    private function getReviews()
    {
        $per_page = 2;
        return $this->offer->reviews()->published()->paginate($per_page);
    }

    private function getProductOffers()
    {
        return $this->offer->product()->first()->offers()->published()->with('colors')->get();
    }

    public static function getMaxPrice()
    {
        return Offer::published()->max('price');
    }
}
