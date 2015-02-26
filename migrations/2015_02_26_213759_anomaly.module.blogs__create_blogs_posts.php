<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlogsCreateBlogsPosts
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlogsCreateBlogsPosts extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'posts',
        'title_column' => 'title',
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'blog'     => [
            'required' => true
        ],
        'title'    => [
            'required' => true
        ],
        'slug'     => [
            'required' => true
        ],
        'category' => [],
        'tags'     => []
    ];

}
