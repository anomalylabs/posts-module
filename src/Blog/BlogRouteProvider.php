<?php namespace Anomaly\BlogModule\Blog;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class BlogRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Blog
 */
class BlogRouteProvider extends RouteServiceProvider
{

    /**
     * Map blog routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/blog',
            'Anomaly\BlogModule\Http\Controller\Admin\BlogController@index'
        );

        $router->any(
            'admin/blog/create',
            'Anomaly\BlogModule\Http\Controller\Admin\BlogController@create'
        );

        $router->any(
            'admin/blog/edit/{id}',
            'Anomaly\BlogModule\Http\Controller\Admin\BlogController@edit'
        );

        $router->any(
            'admin/blog/choose',
            'Anomaly\BlogModule\Http\Controller\Admin\BlogController@choose'
        );
    }
}
