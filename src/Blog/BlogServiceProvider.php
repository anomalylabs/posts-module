<?php namespace Anomaly\BlogModule\Blog;

use Illuminate\Support\ServiceProvider;

/**
 * Class BlogServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Blog
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
            'Anomaly\BlogModule\Blog\BlogModel',
            'Anomaly\BlogModule\Blog\BlogModel'
        );

        $this->app->bind(
            'Anomaly\BlogModule\Blog\Contract\BlogRepositoryInterface',
            'Anomaly\BlogModule\Blog\BlogRepository'
        );

        $this->app->register('Anomaly\BlogModule\Blog\BlogRouteProvider');
    }
}
