<?php namespace Anomaly\BlogModule;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
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
