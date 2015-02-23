<?php namespace Anomaly\BlogsModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class PostsStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Installer
 */
class PostsStreamInstaller extends StreamInstaller
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
        'title'    => [
            'required' => true
        ],
        'blog'     => [
            'required' => true
        ],
        'category' => [
            'required' => true
        ]
    ];

}
