<?php namespace Anomaly\BlogsModule\Http\Controller;

use Anomaly\BlogsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;

/**
 * Class BlogsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Http\Controller
 */
class BlogsController extends PublicController
{

    /**
     * Return an index of existing blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index(PostRepositoryInterface $posts, Request $request)
    {
        $posts = $posts->get();
        return view('anomaly.module.blogs::blogs/index', compact('posts'));
    }
}
