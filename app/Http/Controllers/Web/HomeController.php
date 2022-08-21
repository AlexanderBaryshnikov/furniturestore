<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Offer;
use App\Models\Label;
use App\Services\Labels\LabelsService;
use Illuminate\Http\Request;

class HomeController extends WebController
{
    public function index()
    {
        $offers = Offer::with([
            'product',
            'properties',
            'labels'
        ])
            ->whereRelation(
                'labels', 'offer_id', '!=', null
            )
            ->orderByDesc('id')
            ->get();

        $recommended_offers = $offers->filter(function ($offer) {
            return $offer->labels()->where('name', 'recommend')->first();
        });

        $sale_offers = $offers->filter(function ($offer) {
            return $offer->labels()->where('name', 'sale')->first();
        });

        $new_offers = $offers->filter(function ($offer) {
            return $offer->labels()->where('name', 'new')->first();
        });
//
//        $recommended_offers = LabelsService::getOffersByLabel(Label::recommendLabel()->firstOrFail());//
//        $sale_offers = LabelsService::getOffersByLabel(Label::saleLabel()->firstOrFail());//
//        $new_offers = LabelsService::getOffersByLabel(Label::newLabel()->firstOrFail());

        $articles = Article::limit(3)
            ->orderBy('id', 'desc')
            ->get();

        $banners = Banner::where('type', 'home')
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.home.index', compact(
            'articles',
            'banners',
            'offers',
            'recommended_offers',
            'sale_offers',
            'new_offers'
        ));
    }
}
