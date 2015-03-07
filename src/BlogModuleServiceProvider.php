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
        $this->app->register('Anomaly\BlogModule\Post\PostServiceProvider');
        $this->app->register('Anomaly\BlogModule\Category\CategoryServiceProvider');

        $this->app->register('Anomaly\BlogModule\BlogModuleRouteProvider');
    }
}
