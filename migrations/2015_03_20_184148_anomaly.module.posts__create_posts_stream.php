<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModulePostsCreatePostsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModulePostsCreatePostsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'posts',
        'title_column' => 'title',
        'translatable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'str_id'           => [
            'required' => true,
            'unique'   => true
        ],
        'title'            => [
            'translatable' => true,
            'required'     => true
        ],
        'slug'             => [
            'required' => true,
            'unique'   => true
        ],
        'type'             => [
            'required' => true
        ],
        'publish_at'       => [
            'required' => true
        ],
        'author'           => [
            'required' => true
        ],
        'entry'            => [
            'required' => true
        ],
        'meta_title'       => [
            'translatable' => true
        ],
        'meta_description' => [
            'translatable' => true
        ],
        'meta_keywords'    => [
            'translatable' => true
        ],
        'allow_comments',
        'category',
        'featured',
        'summary',
        'live',
        'tags',
        'ttl',
        'css',
        'js'
    ];

}
