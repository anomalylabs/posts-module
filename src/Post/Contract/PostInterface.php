<?php namespace Anomaly\PostsModule\Post\Contract;

use Anomaly\PostsModule\Type\TypeExtension;

/**
 * Interface PostInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
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
     * Get the type.
     *
     * @return TypeExtension
     */
    public function getType();

    /**
     * Get the type name.
     *
     * @return string
     */
    public function getTypeName();

    /**
     * Get the type description.
     *
     * @return string
     */
    public function getTypeDescription();
}
