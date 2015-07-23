<?php namespace Anomaly\PostsModule\Post\Contract;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Http\Response;

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
     * Return the post's URL.
     *
     * @return string
     */
    public function url();

    /**
     * Return the post's path.
     *
     * @return string
     */
    public function path();

    /**
     * Return the combined meta title.
     *
     * @return string
     */
    public function metaTitle();

    /**
     * Return the combined meta keywords.
     *
     * @return string
     */
    public function metaKeywords();

    /**
     * Return the combined meta description.
     *
     * @return string
     */
    public function metaDescription();

    /**
     * Get the ID.
     *
     * @return null|int
     */
    public function getId();

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

    /**
     * Get the category.
     *
     * @return null|CategoryInterface
     */
    public function getCategory();

    /**
     * Get the related entry.
     *
     * @return EntryInterface
     */
    public function getEntry();

    /**
     * Get the related entry's ID.
     *
     * @return null|int
     */
    public function getEntryId();

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
     * Get the live flag.
     *
     * @return bool
     */
    public function isLive();

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

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse();

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response);
}
