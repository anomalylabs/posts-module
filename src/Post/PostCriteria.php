<?php namespace Anomaly\PostsModule\Post;

use Anomaly\Streams\Platform\Entry\EntryCriteria;

/**
 * Class PostCriteria
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostCriteria extends EntryCriteria
{

    /**
     * Return only live.
     *
     * @return $this
     */
    public function live()
    {
        $this->query->where('enabled', true);
        $this->query->where('publish_at', '<=', date('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * Return chronologically.
     *
     * @return $this
     */
    public function recent()
    {
        $this->live();

        $this->query->orderBy('publish_at', 'DESC');

        return $this;
    }

    /**
     * Return only featured.
     *
     * @return $this
     */
    public function featured()
    {
        $this->recent();

        $this->query->where('featured', true);

        return $this;
    }

}
