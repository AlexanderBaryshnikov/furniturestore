<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\MultiselectField\Multiselect;
use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;

class Offer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Offer::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            BelongsTo::make(__('Product'), 'product', Product::class)
                ->sortable()
                ->rules([
                    'required',
                ]),

            Text::make('SKU', 'sku')
                ->sortable()
                ->rules([
                    'max:255',
                    'required',
                    'unique:offers,sku,' . $this->id,
                ]),

            Number::make(__('Price'), 'price')
                ->sortable()
                ->rules([
                    'min:1',
                    'required',
                ]),

            Number::make(__('Quantity'), 'quantity')
                ->sortable()
                ->rules([
                    'min:1',
                    'required',
                ]),

            Medialibrary::make(__('Image'), 'offers')
                ->single()
                ->sortable()
                ->attachExisting('offers')
                ->accept('image/*')
                ->withMeta([
                    'textAlign' => 'center justify-center',
                    'indexPreviewClassList' => 'rounded w-full h-12 p-2',
                ]),

            BelongsToMany::make('Labels', 'labels', Label::class),

            BelongsToMany::make(__('Properties'), 'properties', Property::class)->fields(function () {
                return [
                    Select::make(__('Property value'), 'property_value_id')->options(
                        \App\Models\PropertyValue::all()->pluck('name', 'id')
                    ),
                ];
            })->allowDuplicateRelations(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new Actions\ProductPropertyRelations,
        ];
    }

    public static function label()
    {
        return __('Offers');
    }

    public static function singularLabel()
    {
        return '';
    }

    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/' . static::uriKey();
    }

    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return '/resources/' . static::uriKey();
    }
}
