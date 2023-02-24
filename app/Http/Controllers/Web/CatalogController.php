<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Services\Filter\FilterService;
use App\Services\Pages\CatalogService;
use App\Services\Pages\OfferService;
use Illuminate\Http\Request;

class CatalogController extends WebController
{
    public function index(Category $category)
    {
        $catalog_data = (new CatalogService($category))->getData();
        if (!$catalog_data['count_offers']) {
            return redirect()->route('catalog.index');
        }

        return view('pages.catalog.index', array_merge($catalog_data, (new FilterService($catalog_data))->getFilters()));
    }

    public function product(Category $category, Product $product)
    {
        return '';
    }

    public function show(Category $category, Product $product, Offer $offer)
    {
        return view('pages.offer.index', (new OfferService($offer))->getData());
    }
}
