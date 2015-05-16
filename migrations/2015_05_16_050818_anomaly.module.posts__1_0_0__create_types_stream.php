<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModulePosts_1_0_0_CreateTypesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'types',
        'title_column' => 'name',
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'required' => true
        ]
    ];

}
