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
        // Category services.
        $this->app->bind(
            'Anomaly\BlogModule\Category\CategoryModel',
            'Anomaly\BlogModule\Category\CategoryModel'
        );

        $this->app->bind(
            'Anomaly\BlogModule\Category\Contract\CategoryRepositoryInterface',
            'Anomaly\BlogModule\Category\CategoryRepository'
        );

        // Post services.
        $this->app->bind(
            'Anomaly\BlogModule\Post\PostModel',
            'Anomaly\BlogModule\Post\PostModel'
        );

        $this->app->singleton(
            'Anomaly\BlogModule\Post\Contract\PostRepositoryInterface',
            'Anomaly\BlogModule\Post\PostRepository'
        );

        $this->app->singleton(
            'Anomaly\BlogModule\Post\PostUrlGenerator',
            'Anomaly\BlogModule\Post\PostUrlGenerator'
        );

        $this->app->register('Anomaly\BlogModule\BlogModuleRouteProvider');
    }
}
