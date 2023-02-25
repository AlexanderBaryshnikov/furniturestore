<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Services\Filter\FilterService;
use App\Services\Pages\CatalogService;
use App\Services\Pages\OfferService;
use Diglactic\Breadcrumbs\Breadcrumbs;

class CatalogController extends WebController
{
    public function index()
    {
        $breadcrumbs = Breadcrumbs::render('catalog.index');

        return view('pages.catalog.index', compact('breadcrumbs'));
    }

    public function category(Category $category)
    {
        $catalog_data = (new CatalogService($category))->getData();
        if (!$catalog_data['count_offers']) {
            return redirect()->route('catalog.index');
        }

        return view('pages.catalog.category.index', array_merge($catalog_data, (new FilterService($catalog_data))->getFilters()));
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
