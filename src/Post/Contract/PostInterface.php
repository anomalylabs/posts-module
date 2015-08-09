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
interface PostInterface extends EntryInterface
{

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
     * Get the string ID.
     *
     * @return string
     */
    public function getStrId();

    /**
     * Get the TTL.
     *
     * @return int|null
     */
    public function getTtl();

    /**
     * Get the tags.
     *
     * @return array
     */
    public function getTags();

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
     * Get the path to the post's type layout.
     *
     * @return string
     */
    public function getLayoutViewPath();

    /**
     * Get the content.
     *
     * @return null|string
     */
    public function getContent();

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content);

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
