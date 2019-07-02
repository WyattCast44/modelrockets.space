<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;

class Motor extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Motor';

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
            ID::make()->hideFromIndex(),

            Text::make('Name')->sortable()
                ->rules('required'),
            
            Text::make('Diameter')->sortable()
                ->rules('nullable')
                ->help(
                    'In millimeters, no units, ex: 25.4'
                ),

            Text::make('Height')->sortable()
                ->rules('nullable')
                ->help(
                    'In millimeters, no units, ex: 25.4'
                ),
        
            Text::make('Total Impulse')->sortable()
                ->rules('nullable')
                ->help(
                    'In N*s, no units, ex: 24.2'
                ),
            
            Text::make('Propellant Mass')->sortable()
                ->rules('nullable')
                ->help(
                    'In grams, no units, ex: 16.3'
                ),
            
            Text::make('Dry Mass')->hideFromIndex()
                ->rules('nullable')
                ->help(
                    'In grams, no units, ex: 25.4'
                ),
            
            Text::make('Total Mass')->hideFromIndex()
                ->rules('nullable')
                ->help(
                    'In grams, no units, ex: 25.4'
                ),
            
            Text::make('Average Thrust')->sortable()
                ->rules('nullable')
                ->help(
                    'In newtons, no units, ex: 25.4'
                ),
                
            Text::make('Max Thrust')->sortable()
                ->rules('nullable')
                ->help(
                    'In newtons, no units, ex: 25.4'
                ),
            
            Text::make('Delay Time')->sortable()
                ->rules('nullable')
                ->help(
                    'In seconds, no units, ex: 25.4'
                ),
            
            BelongsTo::make('Class', 'class', 'App\Nova\MotorClassification')->sortable()
                ->rules('nullable'),

            BelongsTo::make('Type', 'type', 'App\Nova\MotorType')->sortable()
                ->rules('nullable'),
            
            BelongsTo::make('Vendor')->sortable()
                ->rules('nullable'),
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
}
