<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlogsCreateBlogsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlogsCreateBlogsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'blogs',
        'title_column' => 'name',
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'          => [
            'required' => true,
            'unique'   => true
        ],
        'slug'          => [
            'required' => true,
            'unique'   => true
        ],
        'theme_layout'  => [
            'required' => true
        ],
        'description'   => [],
        'allowed_roles' => []
    ];

}
