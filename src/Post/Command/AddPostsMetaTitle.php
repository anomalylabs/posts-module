<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\Streams\Platform\View\ViewTemplate;


/**
 * Class AddPostsMetaTitle
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddPostsMetaTitle
{

    /**
     * Set the meta title.
     *
     * @param ViewTemplate $template
     */
    public function handle(ViewTemplate $template)
    {
        $template->set('meta_title', trans('anomaly.module.posts::breadcrumb.posts'));
    }
}
