<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Command\AddPostBreadcrumb;
use Anomaly\PostsModule\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;

/**
 * Class PostsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller
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

        $this->dispatch(new AddPostsBreadcrumb());

        return view('anomaly.module.posts::posts/index', compact('posts'));
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
        $base      = $settings->get('anomaly.module.posts::module_base', 'posts');
        $structure = $base . '/' . $settings->get(
                'anomaly.module.posts::permalink_structure',
                '{year}/{month}/{day}/{post}'
            );

        $post = $posts->findBySlug($request->segment(array_search('{post}', explode('/', $structure)) + 1));

        $this->dispatch(new AddPostsBreadcrumb());
        $this->dispatch(new AddPostBreadcrumb($post));

        return view('anomaly.module.posts::posts/post', compact('post'));
    }
}
