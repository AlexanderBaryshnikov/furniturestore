<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;

class Banner extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Banner::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
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

            Medialibrary::make(__('Image'), 'banners')
                ->single()
                ->attachExisting('banners')
                ->accept('image/*')
                ->withMeta([
                    'textAlign' => 'center justify-center',
                    'indexPreviewClassList' => 'rounded w-full h-12 p-2',
                    'detailsPreviewClassList' => 'w-32 h-24 rounded-b',
                ])
                ->autouploading(),

            Text::make(__('Title'), 'title')
                ->sortable()
                ->rules([
                    'max:255',
                    'required',
                ]),

            Textarea::make(__('Subtitle'), 'subtitle'),

            Textarea::make(__('Text'), 'text'),

            Text::make(__('Link'), 'link'),

            Text::make(__('Button text'), 'btn_text'),

            Select::make(__('Site page'), 'type')->options([
                \App\Models\Banner::TYPE_HOME => 'Главная',
                \App\Models\Banner::TYPE_PRODUCT => 'Товар',
            ])
                ->rules([
                    'required',
                ]),
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
        return __('Banners');
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
