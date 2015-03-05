<?php namespace Anomaly\BlogModule\Post\Contract;

/**
 * Interface PostInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
 */
interface PostInterface
{

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the URL.
     *
     * @return string
     */
    public function getUrl();
}
