<?php namespace Anomaly\BlogsModule;

use Anomaly\BlogsModule\Blog\Contract\BlogInterface;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class BlogsModuleRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule
 */
class BlogsModuleRouteProvider extends RouteServiceProvider
{

    /**
     * Map the public routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $blogs = $this->app->make('Anomaly\BlogsModule\Blog\Contract\BlogRepositoryInterface');

        foreach ($blogs->enabled() as $blog) {
            $this->mapBlog($router, $blog);
        }
    }

    /**
     * Map a blog's routes.
     *
     * @param Router        $router
     * @param BlogInterface $blog
     */
    protected function mapBlog(Router $router, BlogInterface $blog)
    {
        $router->get(
            $blog->getSlug(),
            'Anomaly\BlogsModule\Http\Controller\BlogsController@index'
        );

        $router->get(
            $blog->getSlug() . '/category/{category}',
            'Anomaly\BlogsModule\Http\Controller\CategoriesController@posts'
        );

        $router->get(
            $blog->getSlug() . '/{year}/{month}/{day}/{post}',
            'Anomaly\BlogsModule\Http\Controller\PostsController@show'
        );
    }
}
