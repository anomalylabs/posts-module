<?php namespace Anomaly\PostsModule\Type\Contract;

    /**
     * Interface TypeInterface
     *
     * @link          http://anomaly.is/streams-platform
     * @author        AnomalyLabs, Inc. <hello@anomaly.is>
     * @author        Ryan Thompson <ryan@anomaly.is>
     * @package       Anomaly\PostsModule\Type\Contract
     */
/**
 * Interface TypeInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Type\Contract
 */
interface TypeInterface
{

    /**
     * Get the ID.
     *
     * @return null|int
     */
    public function getId();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();
}
