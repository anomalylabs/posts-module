<?php namespace Anomaly\BlogModule\Blog;

use Anomaly\BlogModule\Blog\Contract\BlogInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\Blog\BlogBlogEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class BlogModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Blog
 */
class BlogModel extends BlogBlogEntryModel implements BlogInterface
{

    /**
     * Cache the blog.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Get the slug.
     *
     * @return string.
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the description.
     *
     * @return string.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the related posts.
     *
     * @return EntryCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Return the posts relationship.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany('Anomaly\BlogModule\Post\PostModel', 'blog_id');
    }
}
