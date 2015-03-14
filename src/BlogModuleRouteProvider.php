<?php namespace Anomaly\BlogModule;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;

/**
 * Class BlogModuleRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule
 */
class BlogModuleRouteProvider extends RouteServiceProvider
{

    /**
     * Map the public routes.
     *
     * @param Router $router
     */
    public function map(Router $router, SettingRepositoryInterface $settings)
    {

        // Post routes.
        $router->any(
            'admin/blog',
            function (Redirector $redirector) {
                return $redirector->to('admin/blog/posts');
            }
        );

        $router->any(
            'admin/blog/posts',
            'Anomaly\BlogModule\Http\Controller\Admin\PostsController@index'
        );

        $router->any(
            'admin/blog/posts/create/{type}',
            'Anomaly\BlogModule\Http\Controller\Admin\PostsController@create'
        );

        $router->any(
            'admin/blog/posts/edit/{id}',
            'Anomaly\BlogModule\Http\Controller\Admin\PostsController@edit'
        );

        // Category routes.
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

        // Post type routes.
        $router->get(
            'admin/blog/post_types',
            'Anomaly\BlogModule\Http\Controller\Admin\PostTypesController@index'
        );

        $router->get(
            'admin/blog/post_types/customize/{extension}',
            'Anomaly\BlogModule\Http\Controller\Admin\PostTypesController@customize'
        );

        $router->get(
            'admin/blog/post_types/choose',
            'Anomaly\BlogModule\Http\Controller\Admin\PostTypesController@choose'
        );

        /*$router->any(
            'admin/blog/settings',
            'Anomaly\BlogModule\Http\Controller\Admin\SettingsController@edit'
        );

        $router->get(
            $settings->get('anomaly.module.blog::archive_base', 'blog'),
            'Anomaly\BlogModule\Http\Controller\PostsController@index'
        );

        $router->get(
            $settings->get('anomaly.module.blog::category_base', 'category') . '/{category}',
            'Anomaly\BlogModule\Http\Controller\CategoriesController@posts'
        );

        $router->get(
            $settings->get('anomaly.module.blog::tag_base', 'tag') . '/{tag}',
            'Anomaly\BlogModule\Http\Controller\TagsController@posts'
        );

        $router->get(
            $settings->get('anomaly.module.blog::permalink_structure', '{year}/{month}/{day}/{post}'),
            'Anomaly\BlogModule\Http\Controller\PostsController@show'
        );*/
    }
}
