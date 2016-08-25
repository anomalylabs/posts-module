<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Http\Request;

/**
 * Class AddPostBreadcrumb
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddPostBreadcrumb
{

    /**
     * The post instance.
     *
     * @var PostInterface
     */
    protected $post;

    /**
     * Create a new AddPostBreadcrumb instance.
     *
     * @param PostInterface $post
     */
    public function __construct(PostInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Handle the command.
     *
     * @param Request              $request
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function handle(Request $request, BreadcrumbCollection $breadcrumbs)
    {
        $breadcrumbs->add(
            $this->post->getTitle(),
            $request->fullUrl()
        );
    }
}
