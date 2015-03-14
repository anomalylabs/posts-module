<?php namespace Anomaly\BlogModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class BlogModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule
 */
class BlogModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\BlogModule\Post\PostModel'                                => 'Anomaly\BlogModule\Post\PostModel',
        'Anomaly\BlogModule\Category\CategoryModel'                        => 'Anomaly\BlogModule\Category\CategoryModel',
        'Anomaly\BlogModule\Category\Contract\CategoryRepositoryInterface' => 'Anomaly\BlogModule\Category\CategoryRepository'
    ];

    /**
     * Singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\BlogModule\Post\Contract\PostRepositoryInterface' => 'Anomaly\BlogModule\Post\PostRepository',
        'Anomaly\BlogModule\Post\PostUrlGenerator'                 => 'Anomaly\BlogModule\Post\PostUrlGenerator'
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/blog/posts'                            => 'Anomaly\BlogModule\Http\Controller\Admin\PostsController@index',
        'admin/blog/posts/create/{type}'              => 'Anomaly\BlogModule\Http\Controller\Admin\PostsController@create',
        'admin/blog/posts/edit/{id}'                  => 'Anomaly\BlogModule\Http\Controller\Admin\PostsController@edit',
        'admin/blog/categories'                       => 'Anomaly\BlogModule\Http\Controller\Admin\CategoriesController@index',
        'admin/blog/categories/create'                => 'Anomaly\BlogModule\Http\Controller\Admin\CategoriesController@create',
        'admin/blog/categories/edit/{id}'             => 'Anomaly\BlogModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/blog/post_types'                       => 'Anomaly\BlogModule\Http\Controller\Admin\PostTypesController@index',
        'admin/blog/post_types/customize/{extension}' => 'Anomaly\BlogModule\Http\Controller\Admin\PostTypesController@customize',
        'admin/blog/post_types/choose'                => 'Anomaly\BlogModule\Http\Controller\Admin\PostTypesController@choose'
    ];

}
