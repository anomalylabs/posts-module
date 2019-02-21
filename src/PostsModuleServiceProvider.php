<?php namespace Anomaly\PostsModule;

use Anomaly\PostsModule\Category\CategoryModel;
use Anomaly\PostsModule\Category\CategoryRepository;
use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\PostsModule\Http\Controller\Admin\AssignmentsController;
use Anomaly\PostsModule\Http\Controller\Admin\FieldsController;
use Anomaly\PostsModule\Http\Controller\Admin\VersionsController;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\PostsModule\Post\PostModel;
use Anomaly\PostsModule\Post\PostRepository;
use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\PostsModule\Type\TypeModel;
use Anomaly\PostsModule\Type\TypeRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Assignment\AssignmentRouter;
use Anomaly\Streams\Platform\Field\FieldRouter;
use Anomaly\Streams\Platform\Model\Posts\PostsCategoriesEntryModel;
use Anomaly\Streams\Platform\Model\Posts\PostsPostsEntryModel;
use Anomaly\Streams\Platform\Model\Posts\PostsTypesEntryModel;
use Anomaly\Streams\Platform\Version\VersionRouter;

/**
 * Class PostsModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PostsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        PostsPostsEntryModel::class      => PostModel::class,
        PostsTypesEntryModel::class      => TypeModel::class,
        PostsCategoriesEntryModel::class => CategoryModel::class,
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        PostRepositoryInterface::class     => PostRepository::class,
        TypeRepositoryInterface::class     => TypeRepository::class,
        CategoryRepositoryInterface::class => CategoryRepository::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        "posts/rss/categories/{category}.xml" => [
            'as'   => 'anomaly.module.posts::categories.rss',
            'uses' => 'Anomaly\PostsModule\Http\Controller\RssController@category',
        ],
        "posts/rss/tags/{tag}.xml"            => [
            'as'   => 'anomaly.module.posts::tags.rss',
            'uses' => 'Anomaly\PostsModule\Http\Controller\RssController@tag',
        ],
        "posts/rss.xml"                       => [
            'as'   => 'anomaly.module.posts::posts.rss',
            'uses' => 'Anomaly\PostsModule\Http\Controller\RssController@recent',
        ],
        'posts'                               => [
            'as'   => 'anomaly.module.posts::posts.index',
            'uses' => 'Anomaly\PostsModule\Http\Controller\PostsController@index',
        ],
        "posts/preview/{str_id}"              => [
            'as'   => 'anomaly.module.posts::posts.preview',
            'uses' => 'Anomaly\PostsModule\Http\Controller\PostsController@preview',
        ],
        "posts/tags/{tag}"                    => [
            'as'   => 'anomaly.module.posts::tags.view',
            'uses' => 'Anomaly\PostsModule\Http\Controller\TagsController@index',
        ],
        "posts/type/{slug}"                   => [
            'as'   => 'anomaly.module.posts::types.view',
            'uses' => 'Anomaly\PostsModule\Http\Controller\TypesController@index',
        ],
        "posts/categories/{slug}"             => [
            'as'   => 'anomaly.module.posts::categories.view',
            'uses' => 'Anomaly\PostsModule\Http\Controller\CategoriesController@index',
        ],
        "posts/archive/{year}/{month?}"       => [
            'as'   => 'anomaly.module.posts::posts.archive',
            'uses' => 'Anomaly\PostsModule\Http\Controller\ArchiveController@index',
        ],
        "posts/{slug}"                        => [
            'as'   => 'anomaly.module.posts::posts.view',
            'uses' => 'Anomaly\PostsModule\Http\Controller\PostsController@view',
        ],
    ];

    /**
     * Map the addon.
     *
     * @param FieldRouter $fields
     * @param VersionRouter $versions
     * @param AssignmentRouter $assignments
     */
    public function map(FieldRouter $fields, VersionRouter $versions, AssignmentRouter $assignments)
    {
        $fields->route($this->addon, FieldsController::class);
        $versions->route($this->addon, VersionsController::class);
        $assignments->route($this->addon, AssignmentsController::class);
    }

}
