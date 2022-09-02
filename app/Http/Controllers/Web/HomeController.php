<?php

namespace App\Http\Controllers\Web;

use App\Services\Pages\HomeService;

class HomeController extends WebController
{
    public function index()
    {
//        $recommended_offers = LabelsService::getOffersByLabel(Label::recommendLabel()->firstOrFail());//
//        $sale_offers = LabelsService::getOffersByLabel(Label::saleLabel()->firstOrFail());//
//        $new_offers = LabelsService::getOffersByLabel(Label::newLabel()->firstOrFail());

        return view('pages.home.index', (new HomeService())->getData());
    }
}
