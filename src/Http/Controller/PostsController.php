<?php namespace Anomaly\BlogModule\Http\Controller;

use Anomaly\BlogModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;

/**
 * Class PostsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Http\Controller
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

        return view('anomaly.module.blog::posts/show', compact('post'));
    }
}
