<?php namespace Anomaly\BlogsModule\Category;

use Illuminate\Support\ServiceProvider;

/**
 * Class CategoryServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Category
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
            'Anomaly\BlogsModule\Category\CategoryModel',
            'Anomaly\BlogsModule\Category\CategoryModel'
        );

        $this->app->bind(
            'Anomaly\BlogsModule\Category\Contract\CategoryRepositoryInterface',
            'Anomaly\BlogsModule\Category\CategoryRepository'
        );

        $this->app->register('Anomaly\BlogsModule\Category\CategoryRouteProvider');
    }
}
