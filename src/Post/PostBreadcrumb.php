<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Http\Request;

/**
 * Class PostBreadcrumb
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PostBreadcrumb
{
    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The breadcrumb collection.
     *
     * @var BreadcrumbCollection
     */
    protected $breadcrumbs;

    /**
     * Create a new PostBreadcrumb instance.
     *
     * @param Request              $request
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function __construct(Request $request, BreadcrumbCollection $breadcrumbs)
    {
        $this->request     = $request;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Make the post breadcrumbs.
     *
     * @param PostInterface $post
     */
    public function make(PostInterface $post)
    {
        dispatch_sync(new AddPostsBreadcrumb());

        if ($category = $post->getCategory()) {
            $this->breadcrumbs->add($category->getTitle(), $category->route('view'));
        }

        $this->breadcrumbs->add($post->getTitle(), $this->request->path());
    }
}
