<?php namespace Anomaly\BlogModule\Http\Controller;

use Anomaly\BlogModule\Post\Contract\PostRepositoryInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
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
     * Display recent posts.
     *
     * @param PostRepositoryInterface $posts
     * @return \Illuminate\View\View
     */
    public function index(PostRepositoryInterface $posts)
    {
        $posts = $posts->getRecent();

        return view('anomaly.module.blog::posts/index', compact('posts'));
    }

    /**
     * Show an existing post.
     *
     * @param PostRepositoryInterface    $posts
     * @param Request                    $request
     * @param SettingRepositoryInterface $settings
     * @return \Illuminate\View\View
     */
    public function show(PostRepositoryInterface $posts, Request $request, SettingRepositoryInterface $settings)
    {
        $base      = $settings->get('anomaly.module.blog::module_base', 'blog');
        $structure = $base . '/' . $settings->get(
                'anomaly.module.blog::permalink_structure',
                '{year}/{month}/{day}/{post}'
            );

        $post = $posts->findBySlug($request->segment(array_search('{post}', explode('/', $structure)) + 1));

        return view('anomaly.module.blog::posts/show', compact('post'));
    }
}
