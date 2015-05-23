<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\PostsModule\Post\Command\GetPostPath;
use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\Posts\PostsPostsEntryModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;

/**
 * Class PostModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostModel extends PostsPostsEntryModel implements PostInterface
{

    /**
     * The post's response.
     *
     * @var null|Response
     */
    protected $response = null;

    /**
     * The cache time.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Return only active posts.
     *
     * @param Builder $query
     * @return $this
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'live');
    }

    /**
     * Return the post's URL.
     *
     * @return string
     */
    public function url()
    {
        return url($this->path());
    }

    /**
     * Return the post's path.
     *
     * @return string
     */
    public function path()
    {
        return $this->dispatch(new GetPostPath($this));
    }

    /**
     * Return the combined meta title.
     *
     * @return string
     */
    public function metaTitle()
    {
        $metaTitle = $this->getMetaTitle();

        if (!$metaTitle && $type = $this->getType()) {
            $metaTitle = $type->getMetaTitle();
        }

        return $metaTitle;
    }

    /**
     * Return the combined meta keywords.
     *
     * @return string
     */
    public function metaKeywords()
    {
        $metaKeywords = $this->getMetaKeywords();

        if (!$metaKeywords && $type = $this->getType()) {
            $metaKeywords = $type->getMetaKeywords();
        }

        return $metaKeywords;
    }

    /**
     * Return the combined meta description.
     *
     * @return string
     */
    public function metaDescription()
    {
        $metaDescription = $this->getMetaDescription();

        if (!$metaDescription && $type = $this->getType()) {
            $metaDescription = $type->getMetaDescription();
        }

        return $metaDescription;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the type.
     *
     * @return null|TypeInterface
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the type name.
     *
     * @return string
     */
    public function getTypeName()
    {
        $type = $this->getType();

        return $type->getName();
    }

    /**
     * Get the type description.
     *
     * @return string
     */
    public function getTypeDescription()
    {
        return $this->getType()->getDescription();
    }

    /**
     * Get the category.
     *
     * @return null|CategoryInterface
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get the related entry.
     *
     * @return EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Get the related entry's ID.
     *
     * @return null|int
     */
    public function getEntryId()
    {
        $entry = $this->getEntry();

        return $entry->getId();
    }

    /**
     * Get the enabled flag.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Get the response.
     *
     * @return Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set the response.
     *
     * @param $response
     * @return $this
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;

        return $this;
    }
}
