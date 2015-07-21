<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Command\AddCategoryBreadcrumb;
use Anomaly\PostsModule\Command\AddPostBreadcrumb;
use Anomaly\PostsModule\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\PostsModule\Post\PostAuthorizer;
use Anomaly\PostsModule\Post\PostHttp;
use Anomaly\PostsModule\Post\PostLoader;
use Anomaly\PostsModule\Post\PostResolver;
use Anomaly\PostsModule\Post\PostResponse;
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
     * The post HTTP modifier.
     *
     * @var PostHttp
     */
    protected $http;

    /**
     * The post loader.
     *
     * @var PostLoader
     */
    protected $loader;

    /**
     * The post resolver.
     *
     * @var PostResolver
     */
    protected $resolver;

    /**
     * The post responder.
     *
     * @var PostResponse
     */
    protected $response;

    /**
     * The post authorizer.
     *
     * @var PostAuthorizer
     */
    protected $authorizer;

    /**
     * Create a new PostsController instance.
     *
     * @param PostHttp       $http
     * @param PostLoader     $loader
     * @param PostResolver   $resolver
     * @param PostResponse   $response
     * @param PostAuthorizer $authorizer
     */
    public function __construct(
        PostHttp $http,
        PostLoader $loader,
        PostResolver $resolver,
        PostResponse $response,
        PostAuthorizer $authorizer
    ) {
        $this->http       = $http;
        $this->loader     = $loader;
        $this->resolver   = $resolver;
        $this->response   = $response;
        $this->authorizer = $authorizer;

        parent::__construct();
    }

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

        $this->authorizer->authorize($post);
        $this->loader->load($post);
        $this->response->make($post);
        $this->http->cache($post);

        $this->dispatch(new AddPostsBreadcrumb());

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
    public function show()
    {

        if (!$post = $this->resolver->resolve()) {
            abort(404);
        }

        $this->authorizer->authorize($post);
        $this->loader->load($post);
        $this->response->make($post);
        $this->http->cache($post);

        $this->dispatch(new AddPostsBreadcrumb());

        if ($category = $post->getCategory()) {
            $this->dispatch(new AddCategoryBreadcrumb($category));
        }

        $this->dispatch(new AddPostBreadcrumb($post));

        return view('anomaly.module.posts::posts/post', compact('post'));
    }
}
