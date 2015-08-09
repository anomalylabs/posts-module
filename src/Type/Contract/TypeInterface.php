<?php namespace Anomaly\PostsModule\Type\Contract;

/**
 * Interface TypeInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Type\Contract
 */
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Interface TypeInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Type\Contract
 */
interface TypeInterface extends EntryInterface
{

    /**
     * Get the TTL.
     *
     * @return int|null
     */
    public function getTtl();

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

    /**
     * Get the related stream.
     *
     * @return StreamInterface
     */
    public function getEntryStream();

    /**
     * Get the related stream's
     * entry model name.
     *
     * @return string
     */
    public function getEntryModelName();

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle();

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords();

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Get the CSS path.
     *
     * @return string
     */
    public function getCssPath();

    /**
     * Get the JS path.
     *
     * @return string
     */
    public function getJsPath();
}
