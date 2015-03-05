<?php namespace Anomaly\BlogModule\Http\Controller;

use Anomaly\BlogModule\Blog\Contract\BlogRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;

/**
 * Class BlogController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Http\Controller
 */
class BlogController extends PublicController
{

    /**
     * Return an index of existing blog posts.
     *
     * @param BlogRepositoryInterface $blog
     * @param Request                 $request
     * @return \Illuminate\View\View
     */
    public function index(BlogRepositoryInterface $blog, Request $request)
    {
        $blog = $blog->findBySlug($request->segment(1));

        return view('anomaly.module.blog::blog/index', compact('blog'));
    }
}
