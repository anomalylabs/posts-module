<?php namespace Anomaly\BlogsModule\Category;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class CategoryRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Category
 */
class CategoryRouteProvider extends RouteServiceProvider
{

    /**
     * Map the category routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/blogs/categories',
            'Anomaly\BlogsModule\Http\Controller\Admin\CategoriesController@index'
        );

        $router->any(
            'admin/blogs/categories/create',
            'Anomaly\BlogsModule\Http\Controller\Admin\CategoriesController@create'
        );

        $router->any(
            'admin/blogs/categories/edit/{id}',
            'Anomaly\BlogsModule\Http\Controller\Admin\CategoriesController@edit'
        );
    }
}
