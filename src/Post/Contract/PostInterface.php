<?php namespace Anomaly\BlogModule\Post\Contract;

use Anomaly\BlogModule\Blog\Contract\BlogInterface;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
     * Get the related blog.
     *
     * @return BlogInterface
     */
    public function getBlog();

    /**
     * Get the URL.
     *
     * @return string
     */
    public function getUrl();

    /**
     * Return the blog relation.
     *
     * @return HasOne
     */
    public function blog();
}
