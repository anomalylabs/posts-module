<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Category\Command\AddCategoryBreadcrumb;
use Anomaly\PostsModule\Post\Command\AddPostBreadcrumb;
use Anomaly\PostsModule\Post\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Command\AddPostsMetaTitle;
use Anomaly\PostsModule\Post\Command\MakePostResponse;
use Anomaly\PostsModule\Post\Command\MakePreviewResponse;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\PostsModule\Post\PostResolver;
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
    public function index(PostRepositoryInterface $posts, SettingRepositoryInterface $settings)
    {
        if (!$settings->value('anomaly.module.posts::enable_index',true)) {
            abort(404);
        }
        
        $posts = $posts->getRecent($settings->value('anomaly.module.posts::posts_per_page',null));

        $this->dispatch(new AddPostsBreadcrumb());
        $this->dispatch(new AddPostsMetaTitle());

        return view('anomaly.module.posts::posts/index', compact('posts'));
    }

    /**
     * Preview an existing post.
     *
     * @param PostRepositoryInterface $posts
     * @param                         $id
     * @return \Illuminate\View\View
     */
    public function preview(PostRepositoryInterface $posts, $id)
    {
        if (!$post = $posts->findByStrId($id)) {
            abort(404);
        }

        $this->dispatch(new AddPostsBreadcrumb());
        $this->dispatch(new MakePreviewResponse($post));

        if ($category = $post->getCategory()) {
            $this->dispatch(new AddCategoryBreadcrumb($category));
        }

        $this->dispatch(new AddPostBreadcrumb($post));

        return $post->getResponse();
    }

    /**
     * Show an existing post.
     *
     * @param PostRepositoryInterface    $posts
     * @param Request                    $request
     * @param SettingRepositoryInterface $settings
     * @return \Illuminate\View\View
     */
    public function show(PostResolver $resolver)
    {
        if (!$post = $resolver->resolve()) {
            abort(404);
        }

        $this->dispatch(new MakePostResponse($post));
        $this->dispatch(new AddPostsBreadcrumb());

        if ($category = $post->getCategory()) {
            $this->dispatch(new AddCategoryBreadcrumb($category));
        }

        $this->dispatch(new AddPostBreadcrumb($post));

        return $post->getResponse();
    }
}
