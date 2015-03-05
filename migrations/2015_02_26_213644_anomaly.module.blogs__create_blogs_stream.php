<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlogCreateBlogStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlogCreateBlogStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'blog',
        'title_column' => 'name',
        'translatable' => true,
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'          => [
            'translatable' => true,
            'required'     => true,
            'unique'       => true
        ],
        'slug'          => [
            'required' => true,
            'unique'   => true
        ],
        'theme_layout'  => [
            'required' => true
        ],
        'description'   => [
            'translatable' => true
        ],
        'allowed_roles' => []
    ];

}
