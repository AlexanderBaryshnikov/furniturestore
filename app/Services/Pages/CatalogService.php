<?php

namespace App\Services\Pages;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class CatalogService
{
    public static $per_page = 3;
    private Builder $offers_builder;
    private Collection $products;
    private array $properties;
    private $category;
    private int $min_price;
    private int $max_price;

    public function __construct($category, $properties = [], $min_price = 0, $max_price = 0) {
        $this->min_price = $min_price;
        $this->max_price = $max_price;
        $this->category = $category;
        $this->properties = $properties;
        $this->products = $this->getProducts();
        $this->offers_builder = $this->getOffersBuilder();
    }

    public function getData(): array
    {
        return [
            'offers' => $this->getOffers(),
            'category' => $this->category,
            'count_offers' => $this->getCountOffers(),
            'breadcrumbs' => \Breadcrumbs::render('catalog.category',  $this->category ?? null) ?? '',
            'builder' => $this->offers_builder
        ];
    }

    private function getProducts(): Collection
    {
        return isset($this->category->id) ? $this->moveSubcategoryToCategory()->products : Product::published()->get();
    }

    protected function getOffersBuilder(): Builder
    {
        $builder = Offer::published()
            ->whereIn('product_id', $this->getProducts()->pluck('id'))
            ->with('product', 'properties')
            ->whereHas('product', function (Builder $query) {
                return $query->published();
            });

        foreach ($this->properties as $key => $property) {
            $builder = $builder->whereHas('properties', function (Builder $query) use ($key, $property) {
                $query->where(function ($query) use ($key, $property) {
                            $query->where('property_id', $key)
                                ->whereIn('property_value_id', $property);
                        });
            });
        }

        if ($this->min_price) {
            $builder->where('price', '>=', $this->min_price);
        }
        if ($this->max_price) {
            $builder->where('price', '<=', $this->max_price);
        }

        return $builder;
    }

    private function getOffers(): LengthAwarePaginator
    {
        return $this->getOffersBuilder()->orderByDesc('id')
            ->paginate(self::$per_page)->setPath(route('catalog.index'));
    }

    private function getCountOffers(): int
    {
        return $this->offers_builder->count();
    }

    private function moveSubcategoryToCategory(): Category
    {
        $subcategories_builder = Category::with('products')
            ->whereHas('products', function (Builder $query) {
                return $query->published();
            })
            ->subcategory();

        if (isset($this->category->id)) {
            $subcategories_builder->where('parent_id', $this->category->id);
        }

        $subcategories = $subcategories_builder->get();

        if ($subcategories->contains('parent_id', $this->category->id)) {
            $subcategories_list = $subcategories->where('parent_id', $this->category->id);
            foreach ($subcategories_list as $item) {

                if ($item->products->count()) {
                    foreach ($item->products as $product) {
                        $this->category->products[] = $product;
                    }
                }
            }
        }

        return $this->category;
    }
}
