<?php namespace Anomaly\BlogModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class BlogModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule
 */
class BlogModuleInstaller extends ModuleInstaller
{

    /**
     * Module installers.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\BlogModule\Installer\BlogsFieldInstaller',
        'Anomaly\BlogModule\Installer\BlogsStreamInstaller',
        'Anomaly\BlogModule\Installer\CategoriesStreamInstaller',
    ];

}
