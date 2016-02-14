<?php namespace Anomaly\PostsModule;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class PostsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule
 */
class PostsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/posts'                                                => 'Anomaly\PostsModule\Http\Controller\Admin\PostsController@index',
        'admin/posts/create'                                         => 'Anomaly\PostsModule\Http\Controller\Admin\PostsController@create',
        'admin/posts/edit/{id}'                                      => 'Anomaly\PostsModule\Http\Controller\Admin\PostsController@edit',
        'admin/posts/view/{id}'                                      => 'Anomaly\PostsModule\Http\Controller\Admin\PostsController@view',
        'admin/posts/categories'                                     => 'Anomaly\PostsModule\Http\Controller\Admin\CategoriesController@index',
        'admin/posts/categories/create'                              => 'Anomaly\PostsModule\Http\Controller\Admin\CategoriesController@create',
        'admin/posts/categories/edit/{id}'                           => 'Anomaly\PostsModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/posts/categories/view/{id}'                           => 'Anomaly\PostsModule\Http\Controller\Admin\CategoriesController@view',
        'admin/posts/types'                                          => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@index',
        'admin/posts/types/create'                                   => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@create',
        'admin/posts/types/edit/{id}'                                => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@edit',
        'admin/posts/types/assignments/{id}'                         => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@fields',
        'admin/posts/types/choose/{id}'                              => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@choose',
        'admin/posts/types/assignments/{id}/assign/{field}'          => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@assign',
        'admin/posts/types/assignments/{id}/assignment/{assignment}' => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@assignment',
        'admin/posts/fields'                                         => 'Anomaly\PostsModule\Http\Controller\Admin\FieldsController@index',
        'admin/posts/fields/choose'                                  => 'Anomaly\PostsModule\Http\Controller\Admin\FieldsController@choose',
        'admin/posts/fields/create'                                  => 'Anomaly\PostsModule\Http\Controller\Admin\FieldsController@create',
        'admin/posts/fields/edit/{id}'                               => 'Anomaly\PostsModule\Http\Controller\Admin\FieldsController@edit',
        'admin/posts/ajax/choose_type'                               => 'Anomaly\PostsModule\Http\Controller\Admin\AjaxController@chooseType'
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\Streams\Platform\Model\Posts\PostsPostsEntryModel'      => 'Anomaly\PostsModule\Post\PostModel',
        'Anomaly\Streams\Platform\Model\Posts\PostsCategoriesEntryModel' => 'Anomaly\PostsModule\Category\CategoryModel'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PostsModule\Post\Contract\PostRepositoryInterface'         => 'Anomaly\PostsModule\Post\PostRepository',
        'Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface'         => 'Anomaly\PostsModule\Type\TypeRepository',
        'Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface' => 'Anomaly\PostsModule\Category\CategoryRepository'
    ];

    /**
     * Map additional routes.
     *
     * @param Router                     $router
     * @param SettingRepositoryInterface $settings
     */
    public function map(Router $router, SettingRepositoryInterface $settings)
    {
        $tag       = $settings->value('anomaly.module.posts::tag_segment', 'tag');
        $module    = $settings->value('anomaly.module.posts::module_segment', 'posts');
        $category  = $settings->value('anomaly.module.posts::category_segment', 'category');
        $permalink = $settings->value(
            'anomaly.module.posts::permalink_structure',
            [
                'year',
                'month',
                'day',
                'post'
            ]
        );

        $permalink = implode('}/{', $permalink);

        /**
         * Map the RSS methods.
         */
        $router->any(
            "{$module}/rss/category/{category}.xml",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\RssController@category',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        $router->any(
            "{$module}/rss/tag/{tag}.xml",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\RssController@tag',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        $router->any(
            "{$module}/rss.xml",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\RssController@recent',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        /**
         * Map other public routes.
         * Mind the order. Routes are
         * handled first come first serve.
         */
        $router->any(
            "{$module}/{type}",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\TypesController@index',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        $router->any(
            $module,
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\PostsController@index',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        $router->any(
            "{$module}/preview/{id}",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\PostsController@preview',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        $router->any(
            "{$module}/{$tag}/{tag}",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\TagsController@index',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        $router->any(
            "{$module}/{$category}/{category}",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\CategoriesController@index',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        $router->any(
            "{$module}/archive/{year}/{month?}",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\ArchiveController@index',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );

        $router->any(
            "{$module}/{{$permalink}}",
            [
                'uses'           => 'Anomaly\PostsModule\Http\Controller\PostsController@show',
                'streams::addon' => 'anomaly.module.posts'
            ]
        );
    }
}
