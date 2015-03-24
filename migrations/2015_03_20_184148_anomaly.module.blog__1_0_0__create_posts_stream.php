<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlog_1_0_0_CreatePostsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlog_1_0_0_CreatePostsStream extends Migration
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
        'title'        => [
            'translatable' => true,
            'required'     => true
        ],
        'content'      => [
            'required' => true
        ],
        'slug'         => [
            'required' => true
        ],
        'type'         => [
            'required' => true
        ],
        'published_at' => [
            'required' => true
        ],
        'author'       => [
            'required' => true
        ],
        'enabled',
        'allow_comments',
        'excerpt',
        'category',
        'tags'
    ];

}
