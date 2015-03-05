<?php namespace Anomaly\BlogModule\Post\Contract;

/**
 * Interface PostRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
 */
interface PostRepositoryInterface
{

    /**
     * Find a post by it's slug.
     *
     * @param $post
     * @return PostInterface
     */
    public function findBySlug($slug);
}
