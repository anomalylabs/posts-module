<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\Streams\Platform\View\ViewTemplate;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class AddPostsMetaTitle
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Command
 */
class AddPostsMetaTitle implements SelfHandling
{

    /**
     * Set the meta title.
     *
     * @param ViewTemplate $template
     */
    public function handle(ViewTemplate $template)
    {
        $template->set('meta_title', trans('anomaly.module.posts::addon.name'));
    }
}
