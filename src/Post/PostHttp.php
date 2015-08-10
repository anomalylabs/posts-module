<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class PostHttp
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostHttp
{

    /**
     * The setting repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new PostHttp instance.
     *
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(SettingRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Cache the post's HTTP response.
     *
     * @param PostInterface|Arrayable $post
     */
    public function cache(PostInterface $post)
    {
        if (!$post->isLive()) {
            return;
        }

        $ttl      = $post->getTtl();
        $response = $post->getResponse();

        // if no post TTL use the post type TTL.
        if ($ttl === null && $type = $post->getType()) {
            $ttl = $type->getTtl();
        }

        // Default to settings.
        if ($ttl === null) {
            $ttl = $this->settings->get('anomaly.module.posts::ttl');
        }

        if ($ttl && $seconds = $ttl * 60) {

            $response->headers->set('Content-Type', 'text/html');
            $response->headers->set('Etag', $post->etag());
            $response->headers->set(
                'Last-Modified',
                $post->lastModified()->setTimezone('GMT')->format('D, d M Y H:i:s T')
            );

            $response->setTtl($seconds);
        }
    }
}
