<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Post\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\PostsModule\Tag\Command\AddTagBreadcrumb;
use Anomaly\PostsModule\Tag\Command\AddTagMetaTitle;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class TagsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TagsController extends PublicController
{

    /**
     * Return an index of tag posts.
     *
     * @param  PostRepositoryInterface $posts
     * @return \Illuminate\View\View
     */
    public function index($tag)
    {
        dispatch_sync(new AddPostsBreadcrumb());
        dispatch_sync(new AddTagBreadcrumb($tag));
        dispatch_sync(new AddTagMetaTitle($tag));

        return $this->view->make('anomaly.module.posts::tags/index', compact('tag'));
    }
}
