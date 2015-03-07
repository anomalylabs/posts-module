<?php namespace Anomaly\BlogModule\Post;

use Anomaly\BlogModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Model\Blog\BlogPostsEntryModel;

/**
 * Class PostModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
 */
class PostModel extends BlogPostsEntryModel implements PostInterface
{

    /**
     * The cache time.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the URL.
     *
     * @return string
     */
    public function getUrl()
    {
        return app('Anomaly\BlogModule\Post\PostUrlGenerator')->generate($this);
    }
}
