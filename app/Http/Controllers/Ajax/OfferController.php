<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Services\Filter\FilterService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function getOffersCatalog(Request $request)
    {
        $data = json_decode($request->data, 1);
        $out = view('partials.product.block.catalog.index', [
            'offers' => (new FilterService($data))->getOffers($request),
            'active_tab' => $request->active_tab ?? 1
        ]);

        return ['offers' => $out->render(), 'new_page' => $request->page];
    }
}
