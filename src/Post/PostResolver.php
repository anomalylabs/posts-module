<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class PostResolver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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
     * The setting repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new PostResolver instance.
     *
     * @param PostRepositoryInterface    $posts
     * @param Request                    $request
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(PostRepositoryInterface $posts, SettingRepositoryInterface $settings, Request $request)
    {
        $this->posts    = $posts;
        $this->request  = $request;
        $this->settings = $settings;
    }

    /**
     * Resolve the post.
     *
     * @return PostInterface|null
     */
    public function resolve()
    {
        $base      = $this->settings->get('anomaly.module.posts::module_base', 'posts');
        $structure = $base . '/' . $this->settings->get(
                'anomaly.module.posts::permalink_structure',
                '{year}/{month}/{day}/{post}'
            );

        return $this->posts->findBySlug($this->request->segment(array_search('{post}', explode('/', $structure)) + 1));
    }
}
