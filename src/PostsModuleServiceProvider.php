<?php namespace Anomaly\PostsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

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
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        PostsModulePlugin::class
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/posts'                                           => 'Anomaly\PostsModule\Http\Controller\Admin\PostsController@index',
        'admin/posts/create'                                    => 'Anomaly\PostsModule\Http\Controller\Admin\PostsController@create',
        'admin/posts/edit/{id}'                                 => 'Anomaly\PostsModule\Http\Controller\Admin\PostsController@edit',
        'admin/posts/categories'                                => 'Anomaly\PostsModule\Http\Controller\Admin\CategoriesController@index',
        'admin/posts/categories/create'                         => 'Anomaly\PostsModule\Http\Controller\Admin\CategoriesController@create',
        'admin/posts/categories/edit/{id}'                      => 'Anomaly\PostsModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/posts/types'                                     => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@index',
        'admin/posts/types/create'                              => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@create',
        'admin/posts/types/edit/{id}'                           => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@edit',
        'admin/posts/types/fields/{id}'                         => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@fields',
        'admin/posts/types/choose/{id}'                         => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@choose',
        'admin/posts/types/fields/{id}/assign/{field}'          => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@assign',
        'admin/posts/types/fields/{id}/assignment/{assignment}' => 'Anomaly\PostsModule\Http\Controller\Admin\TypesController@assignment',
        'admin/posts/fields'                                    => 'Anomaly\PostsModule\Http\Controller\Admin\FieldsController@index',
        'admin/posts/fields/choose'                             => 'Anomaly\PostsModule\Http\Controller\Admin\FieldsController@choose',
        'admin/posts/fields/create'                             => 'Anomaly\PostsModule\Http\Controller\Admin\FieldsController@create',
        'admin/posts/fields/edit/{id}'                          => 'Anomaly\PostsModule\Http\Controller\Admin\FieldsController@edit',
        'admin/posts/ajax/choose_type'                          => 'Anomaly\PostsModule\Http\Controller\Admin\AjaxController@chooseType',
        'admin/posts/settings'                                  => 'Anomaly\PostsModule\Http\Controller\Admin\SettingsController@edit',
        'posts/rss.xml'                                         => 'Anomaly\PostsModule\Http\Controller\RssController@all'
    ];

    /**
     * Class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\Streams\Platform\Model\Posts\PostsPostsEntryModel'      => 'Anomaly\PostsModule\Post\PostModel',
        'Anomaly\Streams\Platform\Model\Posts\PostsTypesEntryModel'      => 'Anomaly\PostsModule\Type\TypeModel',
        'Anomaly\Streams\Platform\Model\Posts\PostsCategoriesEntryModel' => 'Anomaly\PostsModule\Category\CategoryModel'
    ];

    /**
     * Singleton bindings.
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
     * @param Filesystem  $files
     * @param Application $application
     */
    public function map(Filesystem $files, Application $application)
    {
        // Include public routes.
        if ($files->exists($routes = $application->getStoragePath('posts/routes.php'))) {
            $files->requireOnce($routes);
        } else {
            $files->requireOnce(__DIR__ . '/../resources/routes.php');
        }
    }
}
