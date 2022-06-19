<?php

namespace App\Nova\Actions;

use App\Models\Offer;
use App\Models\Product;
use App\Models\PropertyValue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class ProductPropertyRelations extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * The displayable name of the action.
     *
     * @var string
     */
    public $name = 'Update products and properties data';

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $property_ids = Offer::parseProperties(Offer::getAllProperties($model->product_id))->unique();
            $product = Product::find($model->product_id);
            $product->properties()->detach();
            foreach ($property_ids as $id) {
                $property_value = PropertyValue::find($id);
                $product->properties()->attach($property_value->property->id, ['property_value_id' => $id]);
            }
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
