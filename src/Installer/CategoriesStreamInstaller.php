<?php namespace Anomaly\BlogsModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class CategoriesStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Installer
 */
class CategoriesStreamInstaller extends StreamInstaller
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'categories'
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
        'description' => []
    ];

}
