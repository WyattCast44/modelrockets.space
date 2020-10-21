<?php

namespace App\Nova;

use NovaButton\Button;
use Illuminate\Support\Str;
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
    public static $model = 'App\Domain\Blog\Models\Article';

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
                ->rules('required', 'max:255')
                ->displayUsing(function ($title) {
                    return Str::limit($title, 35);
                })->sortable(),

            Text::make('Subtitle')->sortable()
                ->rules('required', 'max:255')
                ->displayUsing(function ($subtitle) {
                    return Str::limit($subtitle, 35);
                }),

            Text::make('Slug')->sortable()
                ->rules('unique:articles,slug', 'max:255')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('required'),

            Boolean::make('Published')->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->readonly(),

            DateTime::make('Published At')->sortable()
                ->hideWhenCreating()
                ->hideFromIndex(),

            Markdown::make('Body')
                ->rules('required', 'string')
                ->hideFromIndex(),
        ];
    }

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make()->hideFromIndex(),

            BelongsTo::make('User')->sortable()
                ->hideFromIndex(),

            Text::make('Title')->sortable()
                ->rules('required', 'max:255')
                ->displayUsing(function ($title) {
                    return Str::limit($title, 35);
                })->sortable(),

            Text::make('Subtitle')->sortable()
                ->rules('required', 'max:255')
                ->displayUsing(function ($subtitle) {
                    return Str::limit($subtitle, 35);
                }),

            Text::make('Slug')->sortable()
                ->rules('unique:articles,slug', 'max:255')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->rules('required'),

            Boolean::make('Published')->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->readonly(),

            DateTime::make('Published At')->sortable()
                ->hideWhenCreating()
                ->hideFromIndex(),

            Markdown::make('Body')
                ->rules('required', 'string')
                ->hideFromIndex(),

            Button::make('View')
                ->link($this->path('show'))
                ->visible($this->published_at != null)
                ->hideWhenCreating(),

            Button::make('Preview')
                ->link($this->path('preview'))
                ->visible($this->published_at == null)
                ->hideWhenCreating(),
        ];
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
                return ($this->resource->published) ? false : true;
            }),
            (new Actions\UnpublishArticle)->canSee(function () {
                return ($this->resource->published) ? true : false;
            }),
        ];
    }
}
