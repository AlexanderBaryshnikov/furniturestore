<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use App\Services\Pages\CatalogService;
use App\Services\Pages\OfferService;
use Illuminate\Http\Request;

class CatalogController extends WebController
{
    public function index(Category $category)
    {
        return view('pages.catalog.index', (new CatalogService($category))->getData());
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
