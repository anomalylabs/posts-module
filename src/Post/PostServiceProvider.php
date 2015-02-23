<?php namespace Anomaly\BlogsModule\Post;

use Illuminate\Support\ServiceProvider;

/**
 * Class PostServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Post
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
            'Anomaly\BlogsModule\Post\PostModel',
            'Anomaly\BlogsModule\Post\PostModel'
        );

        $this->app->bind(
            'Anomaly\BlogsModule\Post\Contract\PostRepositoryInterface',
            'Anomaly\BlogsModule\Post\PostRepository'
        );

        $this->app->register('Anomaly\BlogsModule\Post\PostRouteProvider');
    }
}
