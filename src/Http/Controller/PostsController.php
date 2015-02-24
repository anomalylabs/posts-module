<?php namespace Anomaly\BlogsModule\Http\Controller;

use Anomaly\BlogsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;

/**
 * Class PostsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Http\Controller
 */
class PostsController extends PublicController
{

    /**
     * Show an existing post.
     *
     * @param PostRepositoryInterface $posts
     * @param Request                 $request
     * @return \Illuminate\View\View
     */
    public function show(PostRepositoryInterface $posts, Request $request)
    {
        $post = $posts->findBySlug($request->segment(5));

        return view('anomaly.module.blogs::posts/show', compact('post'));
    }
}
