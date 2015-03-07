<?php namespace Anomaly\BlogModule\PostType;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class PostTypeRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\PostType
 */
class PostTypeRouteProvider extends RouteServiceProvider
{

    /**
     * Map the routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->get(
            'admin/blog/types/choose',
            'Anomaly\BlogModule\Http\Controller\Admin\PostTypesController@choose'
        );
    }
}
