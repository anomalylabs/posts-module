<?php namespace Anomaly\BlogsModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class BlogsStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Installer
 */
class BlogsStreamInstaller extends StreamInstaller
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
        'description'   => [],
        'allowed_roles' => []
    ];

}
