<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;

/**
 * Class PostResolver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PostsModule\Post
 */
class PostResolver
{

    /**
     * The post repository.
     *
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new PostResolver instance.
     *
     * @param PostRepositoryInterface $posts
     * @param Repository              $config
     * @param Request                 $request
     */
    public function __construct(PostRepositoryInterface $posts, Repository $config, Request $request)
    {
        $this->posts   = $posts;
        $this->request = $request;
        $this->config  = $config;
    }

    /**
     * Resolve the post.
     *
     * @return PostInterface|null
     */
    public function resolve()
    {
        $permalink = explode('/', $this->config->get('anomaly.module.posts::paths.route'));

        return $this->posts->findBySlug($this->request->segment(array_search('{post}', $permalink) + 2));
    }
}
