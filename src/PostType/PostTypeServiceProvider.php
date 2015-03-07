<?php namespace Anomaly\BlogModule\PostType;

use Illuminate\Support\ServiceProvider;

/**
 * Class PostTypeServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\PostType
 */
class PostTypeServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\BlogModule\PostType\PostTypeRouteProvider');
    }
}
