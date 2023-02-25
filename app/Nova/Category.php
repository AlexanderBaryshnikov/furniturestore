<?php

namespace App\Nova;

use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Select;

class Category extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Category::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
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

            Text::make(__('Name'), 'name')
                ->sortable()
                ->rules([
                    'max:255',
                    'required',
                ]),

            Boolean::make(__('Subcategory'), 'is_subcategory')
                ->sortable()
                ->default(false),


            Select::make(__('Parent category'), 'parent_id')->searchable()->options(
                \App\Models\Category::notSubcategory()->get()->mapWithKeys(function ($category) {
                    return [$category['id'] => $category['name']];
                })
            )
                ->default(0),

            HasMany::make(__('Products'), 'products', Product::class),

            Medialibrary::make(__('Image'), 'category')
                ->sortable()
                ->attachExisting('category')
                ->accept('image/*')
                ->withMeta([
                    'textAlign' => 'center justify-center',
                    'indexPreviewClassList' => 'rounded w-full h-12 p-2',
                ]),
        ];
    }

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make(__('Name'), 'name')
                ->sortable()
                ->rules([
                    'max:255',
                    'required',
                ]),

            Boolean::make(__('Subcategory'), 'is_subcategory')
                ->sortable()
                ->default(false),
        ];
    }

    public function fieldsForDetail(NovaRequest $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make(__('Name'), 'name')
                ->sortable()
                ->rules([
                    'max:255',
                    'required',
                ]),

            Boolean::make(__('Subcategory'), 'is_subcategory')
                ->sortable()
                ->default(false),

            HasMany::make(__('Products'), 'products', Product::class),
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
        return [];
    }

    public static function label()
    {
        return __('Categories');
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
