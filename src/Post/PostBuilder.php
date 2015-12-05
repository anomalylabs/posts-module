<?php namespace Anomaly\PostsModule\Post;

use Anomaly\Streams\Platform\Entry\Plugin\EntryBuilder;

/**
 * Class PostBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostBuilder extends EntryBuilder
{

    /**
     * Return recent posts.
     */
    public function recent()
    {
        $this->query->orderBy('publish_at', 'DESC');
    }

}
