<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlogCreateCategoriesStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlogCreateCategoriesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'categories',
        'title_column' => 'title',
        'translatable' => true,
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'title'       => [
            'translatable' => true,
            'required'     => true,
            'unique'       => true
        ],
        'slug'        => [
            'required' => true,
            'unique'   => true
        ],
        'blog'        => [
            'required' => true
        ],
        'description' => [
            'translatable' => true
        ]
    ];

}
