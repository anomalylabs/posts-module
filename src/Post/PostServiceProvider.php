<?php namespace Anomaly\BlogModule\Post;

use Illuminate\Support\ServiceProvider;

/**
 * Class PostServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
 */
class PostServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\BlogModule\Post\PostModel',
            'Anomaly\BlogModule\Post\PostModel'
        );

        $this->app->bind(
            'Anomaly\BlogModule\Post\Contract\PostRepositoryInterface',
            'Anomaly\BlogModule\Post\PostRepository'
        );

        $this->app->register('Anomaly\BlogModule\Post\PostRouteProvider');
    }
}
