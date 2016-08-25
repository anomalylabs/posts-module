<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Contracts\Config\Repository;

/**
 * Class AddPostsBreadcrumb
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddPostsBreadcrumb
{

    /**
     * Handle the command.
     *
     * @param Repository           $config
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function handle(Repository $config, BreadcrumbCollection $breadcrumbs)
    {
        $breadcrumbs->add(
            'anomaly.module.posts::breadcrumb.posts',
            $config->get('anomaly.module.posts::paths.module')
        );
    }
}
