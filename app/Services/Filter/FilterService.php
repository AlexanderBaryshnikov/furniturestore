<?php

namespace App\Services\Filter;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PropertyValue;
use App\Services\Pages\CatalogService;

class FilterService extends CatalogService
{
    private array $filters;
    public function __construct(
        private array $data
    ) {}

    public function getFilters(): array
    {
        $offers = $this->data['builder']->get();
        foreach ($offers as $offer) {
            foreach ($offer->properties as $property) {
                if (isset($this->filters['filters'][$property->name][$property->pivot->property_value_id])) continue;
                $this->filters['filters'][$property->name][$property->pivot->property_value_id] = ['property_id' => $property->id, 'value_id' => $property->pivot->property_value_id, 'value' => PropertyValue::find($property->pivot->property_value_id)->name];
            }

        }
        return $this->filters;
    }

    private function getPropertiesList()
    {
        $properties = [];
        foreach ($this->data as $property) {
            $properties[$property['property_id']][] = $property['property_value_id'];
        }

        return $properties;
    }

    public function getOffers(Request $request)
    {
        $category = $request->category_id ? Category::find($request->category_id) : null;

        return (new CatalogService($category, $this->getPropertiesList(), $request->min_price ?? 0, $request->max_price ?? 0))->getData()['offers'];
    }
}
