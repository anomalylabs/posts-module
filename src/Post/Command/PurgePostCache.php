<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Http\HttpCache;
use Anomaly\Streams\Platform\Routing\UrlGenerator;

/**
 * Class PurgePostCache
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PurgePostCache
{

    /**
     * The post instance.
     *
     * @var PostInterface
     */
    protected $post;

    /**
     * Return the path for a post.
     *
     * @param PostInterface $post
     */
    public function __construct(PostInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Handle the command.
     *
     * @param HttpCache $cache
     */
    public function handle(HttpCache $cache, UrlGenerator $url)
    {
        $cache->purge(
            parse_url($this->post->isLive() ? $this->post->route('view') : $this->post->route('preview'), PHP_URL_PATH)
        );

        foreach ($this->post->getTags() as $tag) {
            $cache->purge(parse_url($url->route('anomaly.module.posts::tags.view', compact('tag')), PHP_URL_PATH));
        }
    }

}
