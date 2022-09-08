<?php

namespace App\Services\Pages;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class CatalogService
{
    public static $per_page = 2;
    private Builder $offers_builder;
    private Collection $products;

    public function __construct(
        private  $category,
    ) {
        $this->products = $this->getProducts();
        $this->offers_builder = $this->getOffersBuilder();
    }

    public function getData(): array
    {
        return [
            'offers' => $this->getOffers(),
            'category' => $this->category,
            'count_offers' => $this->getCountOffers(),
            'breadcrumbs' => \Breadcrumbs::render('catalog.index',  $this->category ?? null) ?? '',
        ];
    }

    private function getProducts(): Collection
    {
        return isset($this->category->id) ? $this->category->products()->with('offers')->get() : Product::published()->get();
    }

    private function getOffersBuilder(): Builder
    {
        return Offer::published()
            ->whereIn('product_id', $this->products->pluck('id'))
            ->with('product')
            ->whereHas('product', function (Builder $query) {
                return $query->where('published', 1);
            });
    }

    private function getOffers(): LengthAwarePaginator
    {
        return $this->offers_builder->orderByDesc('id')
            ->paginate(self::$per_page);
    }

    private function getCountOffers(): int
    {
        return $this->offers_builder->count();
    }
}
