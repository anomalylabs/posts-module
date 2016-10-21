<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Date Formats
    |--------------------------------------------------------------------------
    |
    | Specify the date format for publish_at
    | values in the routable array.
    |
    | i.e. year => 'Y'
    |
    | You can also define additional keys to include
    | in the routable array.
    |
    | i.e. year => "format" // Adds {publish_at_year} to routable array:
    |
    | "posts/{publish_at_year}/{slug}" => route information
    |
    */
    'publish_at' => [
        'year'  => 'Y',
        'month' => 'm',
        'day'   => 'd',
    ],
];
