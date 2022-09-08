<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Pages\CatalogService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function getOffersCatalog(Request $request)
    {
        $category = $request->category_id ? Category::find($request->category_id) : null;
        $data = (new CatalogService($category))->getData();
        $out = view('partials.product.block.catalog.index', ['offers' => $data['offers'], 'active_tab' => $request->active_tab ?? 1]);

        return ['offers' => str($out), 'new_page' => $request->page];
    }
}
