<?php namespace Anomaly\BlogModule\Post;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class PostRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
 */
class PostRouteProvider extends RouteServiceProvider
{

    /**
     * Map the post routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/blog/posts',
            'Anomaly\BlogModule\Http\Controller\Admin\PostsController@index'
        );

        $router->any(
            'admin/blog/posts/create/{blog}',
            'Anomaly\BlogModule\Http\Controller\Admin\PostsController@create'
        );

        $router->any(
            'admin/blog/posts/edit/{blog}/{id}',
            'Anomaly\BlogModule\Http\Controller\Admin\PostsController@edit'
        );
    }
}
