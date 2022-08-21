<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Services\Pages\OfferService;
use Illuminate\Http\Request;

class OfferController extends WebController
{
    public function show(Offer $offer)
    {
        return view('pages.offer.index', (new OfferService($offer))->getData());
    }
}
