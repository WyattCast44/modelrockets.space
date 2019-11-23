<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Output Path
    |--------------------------------------------------------------------------
    |
    | You can change where your generated schema file will
    | be created below, default is `database\schemas`
    |
    */
    'path' => base_path('database/schemas'),

    /*
    |--------------------------------------------------------------------------
    | Output File Extension
    |--------------------------------------------------------------------------
    |
    | You can change the default file extension of the generated files
    | the default is `.schema.json`. Note: The output format is JSON
    |
    */
    'extension' => '.schema.json',

    /*
    |--------------------------------------------------------------------------
    | Ignored Tables
    |--------------------------------------------------------------------------
    |
    | You can declare any tables that you would like to
    | ignore while generating table schemas
    |
    */
    'ignore' => [
        'action_events',
        'jobs',
        'migrations',
        'password_resets',
        'telescope_entries_tags',
        'telescope_entries',
        'telescope_monitoring',
    ]

];
