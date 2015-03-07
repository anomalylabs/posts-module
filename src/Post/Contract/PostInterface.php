<?php namespace Anomaly\BlogModule\Post\Contract;

use Anomaly\BlogModule\PostType\PostTypeExtension;

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

    /**
     * Get the post type.
     *
     * @return PostTypeExtension
     */
    public function getType();

    /**
     * Get the post type name.
     *
     * @return string
     */
    public function getTypeName();

    /**
     * Get the post type description.
     *
     * @return string
     */
    public function getTypeDescription();
}
