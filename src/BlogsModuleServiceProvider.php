<?php namespace Anomaly\BlogsModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class BlogsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule
 */
class BlogsModuleServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\BlogsModule\Blog\BlogServiceProvider');
        $this->app->register('Anomaly\BlogsModule\Post\PostServiceProvider');
        $this->app->register('Anomaly\BlogsModule\Category\CategoryServiceProvider');

        $this->app->register('Anomaly\BlogsModule\BlogModuleRouteProvider');
    }
}
