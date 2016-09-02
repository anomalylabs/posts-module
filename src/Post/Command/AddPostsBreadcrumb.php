<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;

/**
 * Class AddPostsBreadcrumb
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PostsModule\Post\Command
 */
class AddPostsBreadcrumb implements SelfHandling
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
