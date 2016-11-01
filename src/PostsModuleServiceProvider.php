<?php namespace Anomaly\PostsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class PostsModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PostsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        "posts/rss/categories/{category}.xml"                        => [
            'as'   => 'anomaly.module.posts::categories.rss',
            'uses' => 'Anomaly\PostsModule\Http\Controller\RssController@category',
        ],
        "posts/rss/tags/{tag}.xml"                                   => [
            'as'   => 'anomaly.module.posts::tags.rss',
            'uses' => 'Anomaly\PostsModule\Http\Controller\RssController@tag',
        ],
        "posts/rss.xml"                                              => [
            'as'   => 'anomaly.module.posts::posts.rss',
            'uses' => 'Anomaly\PostsModule\Http\Controller\RssController@recent',
        ],
        'posts'                                                      => [
            'as'   => 'anomaly.module.posts::posts.index',
            'uses' => 'Anomaly\PostsModule\Http\Controller\PostsController@index',
        ],
        "posts/preview/{str_id}"                                     => [
            'as'   => 'anomaly.module.posts::posts.preview',
            'uses' => 'Anomaly\PostsModule\Http\Controller\PostsController@preview',
        ],
        "posts/tags/{tag}"                                           => [
            'as'   => 'anomaly.module.posts::tags.view',
            'uses' => 'Anomaly\PostsModule\Http\Controller\TagsController@index',
        ],
        "posts/categories/{slug}"                                    => [
            'as'   => 'anomaly.module.posts::categories.view',
            'uses' => 'Anomaly\PostsModule\Http\Controller\CategoriesController@index',
        ],
        "posts/archive/{year}/{month?}"                              => [
            'as'   => 'anomaly.module.posts::tags.archive',
            'uses' => 'Anomaly\PostsModule\Http\Controller\ArchiveController@index',
        ],
        "posts/{slug}"                                               => [
            'as'   => 'anomaly.module.posts::posts.view',
            'uses' => 'Anomaly\PostsModule\Http\Controller\PostsController@view',
        ],
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
        'admin/posts/ajax/choose_type'                               => 'Anomaly\PostsModule\Http\Controller\Admin\AjaxController@chooseType',
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\Streams\Platform\Model\Posts\PostsPostsEntryModel'      => 'Anomaly\PostsModule\Post\PostModel',
        'Anomaly\Streams\Platform\Model\Posts\PostsCategoriesEntryModel' => 'Anomaly\PostsModule\Category\CategoryModel',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\PostsModule\Post\Contract\PostRepositoryInterface'         => 'Anomaly\PostsModule\Post\PostRepository',
        'Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface'         => 'Anomaly\PostsModule\Type\TypeRepository',
        'Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface' => 'Anomaly\PostsModule\Category\CategoryRepository',
    ];
}
