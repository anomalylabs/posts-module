<?php namespace Anomaly\BlogModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class BlogModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule
 */
class BlogModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\BlogModule\Blog\BlogServiceProvider');
        $this->app->register('Anomaly\BlogModule\Post\PostServiceProvider');
        $this->app->register('Anomaly\BlogModule\Category\CategoryServiceProvider');

        // TODO: Improve this - need to reorganize addon state
        if ($this->app->make('Anomaly\Streams\Platform\Application\Application')->isInstalled()) {
            //$this->app->register('Anomaly\BlogModule\BlogModuleRouteProvider');
        }
    }
}
