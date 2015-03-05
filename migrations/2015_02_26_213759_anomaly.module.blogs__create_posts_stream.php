<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlogCreateBlogPosts
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlogCreatePostsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'posts',
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
        'blog'     => [
            'required' => true
        ],
        'title'    => [
            'translatable' => true,
            'required'     => true
        ],
        'slug'     => [
            'required' => true
        ],
        'category' => [],
        'tags'     => []
    ];

}
