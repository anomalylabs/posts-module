<?php namespace Anomaly\BlogsModule\Post\Contract;

use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Interface PostRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Post
 */
interface PostRepositoryInterface
{

    /**
     * Get posts for a blog.
     *
     * @return EntryCollection
     */
    public function get();
}
