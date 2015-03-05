<?php namespace Anomaly\BlogModule;

use Anomaly\BlogModule\Blog\Contract\BlogInterface;
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
    public function map(Router $router)
    {
        $blog = $this->app->make('Anomaly\BlogModule\Blog\Contract\BlogRepositoryInterface');

        foreach ($blog->enabled() as $blog) {
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
            'Anomaly\BlogModule\Http\Controller\BlogController@index'
        );

        $router->get(
            $blog->getSlug() . '/category/{category}',
            'Anomaly\BlogModule\Http\Controller\CategoriesController@posts'
        );

        $router->get(
            $blog->getSlug() . '/{year}/{month}/{day}/{post}',
            'Anomaly\BlogModule\Http\Controller\PostsController@show'
        );
    }
}
