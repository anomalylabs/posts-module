<?php namespace Anomaly\BlogModule\Category;

use Illuminate\Support\ServiceProvider;

/**
 * Class CategoryServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Category
 */
class CategoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\BlogModule\Category\CategoryModel',
            'Anomaly\BlogModule\Category\CategoryModel'
        );

        $this->app->bind(
            'Anomaly\BlogModule\Category\Contract\CategoryRepositoryInterface',
            'Anomaly\BlogModule\Category\CategoryRepository'
        );

        $this->app->register('Anomaly\BlogModule\Category\CategoryRouteProvider');
    }
}
