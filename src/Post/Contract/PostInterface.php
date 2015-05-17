<?php namespace Anomaly\PostsModule\Post\Contract;

use Anomaly\PostsModule\Type\Contract\TypeInterface;

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
     * Return the post's path.
     *
     * @return string
     */
    public function path();

    /**
     * Get the post title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the type.
     *
     * @return null|TypeInterface
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
