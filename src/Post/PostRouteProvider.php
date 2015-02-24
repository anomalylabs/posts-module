<?php namespace Anomaly\BlogsModule\Post;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class PostRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Post
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
            'admin/blogs/posts',
            'Anomaly\BlogsModule\Http\Controller\Admin\PostsController@index'
        );

        $router->any(
            'admin/blogs/posts/create/{blog}',
            'Anomaly\BlogsModule\Http\Controller\Admin\PostsController@create'
        );

        $router->any(
            'admin/blogs/posts/edit/{blog}/{id}',
            'Anomaly\BlogsModule\Http\Controller\Admin\PostsController@edit'
        );
    }
}
