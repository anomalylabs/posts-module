<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlogsCreateBlogsCategories
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlogsCreateBlogsCategories extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'categories',
        'title_column' => 'title',
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'title'       => [
            'required' => true,
            'unique'   => true
        ],
        'slug'        => [
            'required' => true,
            'unique'   => true
        ],
        'blog'        => [
            'required' => true
        ],
        'description' => []
    ];

}
