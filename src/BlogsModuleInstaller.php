<?php namespace Anomaly\BlogsModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class BlogsModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule
 */
class BlogsModuleInstaller extends ModuleInstaller
{

    /**
     * Module installers.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\BlogsModule\Installer\BlogsFieldInstaller',
        'Anomaly\BlogsModule\Installer\BlogsStreamInstaller',
        'Anomaly\BlogsModule\Installer\PostsStreamInstaller',
        'Anomaly\BlogsModule\Installer\CategoriesStreamInstaller',
    ];

}
