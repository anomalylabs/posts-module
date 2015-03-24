<?php namespace Anomaly\BlogModule\Post;

use Anomaly\BlogModule\Post\Contract\PostInterface;
use Anomaly\BlogModule\PostType\PostTypeExtension;
use Anomaly\Streams\Platform\Model\Blog\BlogPostsEntryModel;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class PostModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
 */
class PostModel extends BlogPostsEntryModel implements PostInterface
{

    /**
     * The cache time.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        self::observe(app('Anomaly\BlogModule\Post\PostObserver'));
    }

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
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the URL.
     *
     * @return string
     */
    public function getUrl()
    {
        return app('Anomaly\BlogModule\Post\PostUrlGenerator')->generate($this);
    }

    /**
     * Get the post type.
     *
     * @return PostTypeExtension
     */
    public function getType()
    {
        return app($this->type);
    }

    /**
     * Get the post type name.
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->getType()->getName();
    }

    /**
     * Get the post type description.
     *
     * @return string
     */
    public function getTypeDescription()
    {
        return $this->getType()->getDescription();
    }
}
