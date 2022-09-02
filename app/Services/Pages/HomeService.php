<?php

namespace App\Services\Pages;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Offer;
use Illuminate\Http\Request;

class HomeService
{
    private $offers;
    private $recommend_offers;
    private $sale_offers;
    private $new_offers;
    private $articles;
    private $banners;

    public function __construct()
    {
        $this->offers = $this->getOffers();
        $this->recommend_offers = $this->getRecommendOffers();
        $this->sale_offers = $this->getSaleOffers();
        $this->new_offers = $this->getNewOffers();
        $this->articles = $this->getArticles();
        $this->banners = $this->getBanners();
    }

    public function getData(): array
    {
        return [
            'articles' => $this->articles,
            'banners' => $this->banners,
            'offers' => $this->offers,
            'recommended_offers' => $this->recommend_offers,
            'sale_offers' => $this->sale_offers,
            'new_offers' => $this->new_offers
        ];
    }

    private function getOffers()
    {
        return Offer::with([
            'product',
            'labels'
        ])
            ->whereRelation(
                'labels', 'offer_id', '!=', null
            )
            ->orderByDesc('id')
            ->get();
    }

    private function getRecommendOffers()
    {
        return $this->offers->filter(function ($offer) {
            return $offer->labels()->where('name', 'recommend')->first();
        });
    }

    private function getSaleOffers()
    {
        return $this->offers->filter(function ($offer) {
            return $offer->labels()->where('name', 'sale')->first();
        });
    }

    private function getNewOffers()
    {
        return $this->offers->filter(function ($offer) {
            return $offer->labels()->where('name', 'new')->first();
        });
    }

    private function getArticles()
    {
        return Article::limit(3)
            ->orderBy('id', 'desc')
            ->get();
    }

    private function getBanners()
    {
        return Banner::where('type', 'home')
            ->orderBy('id', 'desc')
            ->get();
    }
}
