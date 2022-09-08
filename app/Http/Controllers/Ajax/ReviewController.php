<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ReviewController extends Controller
{
    public function getReviewsOffer(Request $request)
    {
        $data = '';
        $per_page = 2;
        $offer = Offer::where('id', $request->id ?? 1)
            ->first();
        $reviews = $offer->reviews()
            ->published()
            ->paginate($per_page)
            ->setPath(route('catalog.offer', ['category' => $offer->product->category, 'product' => $offer->product, 'offer' => $offer->slug]));
        $data .= view('partials.offer.tabs.reviews.list.index', ['reviews' => $reviews]);

        return ['reviews' => $data, 'new_page' => $request->page];
    }
}
