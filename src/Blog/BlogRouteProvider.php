<?php namespace Anomaly\BlogsModule\Blog;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class BlogRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Blog
 */
class BlogRouteProvider extends RouteServiceProvider
{

    /**
     * Map blogs routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/blogs',
            'Anomaly\BlogsModule\Http\Controller\Admin\BlogsController@index'
        );

        $router->any(
            'admin/blogs/create',
            'Anomaly\BlogsModule\Http\Controller\Admin\BlogsController@create'
        );

        $router->any(
            'admin/blogs/edit/{id}',
            'Anomaly\BlogsModule\Http\Controller\Admin\BlogsController@edit'
        );
    }
}
