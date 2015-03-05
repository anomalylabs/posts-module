<?php namespace Anomaly\BlogModule\Category;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class CategoryRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Category
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
            'admin/blog/categories',
            'Anomaly\BlogModule\Http\Controller\Admin\CategoriesController@index'
        );

        $router->any(
            'admin/blog/categories/create',
            'Anomaly\BlogModule\Http\Controller\Admin\CategoriesController@create'
        );

        $router->any(
            'admin/blog/categories/edit/{id}',
            'Anomaly\BlogModule\Http\Controller\Admin\CategoriesController@edit'
        );
    }
}
