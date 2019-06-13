<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\NovaRequest;

class Article extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Article';

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
        'title'
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
            ID::make()->hideFromIndex(),

            BelongsTo::make('User')->sortable()
                ->hideFromIndex(),

            Text::make('Title')->sortable()
                ->rules('required', 'max:255'),

            Text::make('Subtitle')->sortable()
                ->rules('required', 'max:255'),

            Text::make('Slug')->sortable()
                ->rules('unique:articles,slug', 'max:255')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Boolean::make('Published')->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->readonly(),

            DateTime::make('Published At')->sortable()
                ->hideWhenCreating()
                ->hideFromIndex()
                ->readonly(),

            Markdown::make('Body')
                ->rules('required', 'string')
                ->hideFromIndex()
                ->alwaysShow(),
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
            (new Actions\PublishArticle)->canSee(function () {
                return $this->resource->published !== false;
            }),
        ];
    }
}
