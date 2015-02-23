<?php namespace Anomaly\BlogsModule\Blog;

use Illuminate\Support\ServiceProvider;

/**
 * Class BlogServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Blog
 */
class BlogServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\BlogsModule\Blog\BlogModel',
            'Anomaly\BlogsModule\Blog\BlogModel'
        );

        $this->app->bind(
            'Anomaly\BlogsModule\Blog\Contract\BlogRepositoryInterface',
            'Anomaly\BlogsModule\Blog\BlogRepository'
        );

        $this->app->register('Anomaly\BlogsModule\Blog\BlogRouteProvider');
    }
}
