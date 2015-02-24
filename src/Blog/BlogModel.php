<?php namespace Anomaly\BlogsModule\Blog;

use Anomaly\BlogsModule\Blog\Contract\BlogInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\Blogs\BlogsBlogsEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class BlogModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Blog
 */
class BlogModel extends BlogsBlogsEntryModel implements BlogInterface
{

    /**
     * Cache the blogs.
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
        return $this->hasMany('Anomaly\BlogsModule\Post\PostModel', 'blog_id');
    }
}
