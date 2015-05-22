<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\PostsModule\Post\Command\GetPostPath;
use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\Posts\PostsPostsEntryModel;
use Illuminate\Database\Eloquent\Builder;

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
}
