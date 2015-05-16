<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Type\TypeExtension;
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
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        self::observe(app('Anomaly\PostsModule\Post\PostObserver'));
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
        return app('Anomaly\PostsModule\Post\PostUrlGenerator')->generate($this);
    }

    /**
     * Get the type.
     *
     * @return TypeExtension
     */
    public function getType()
    {
        return app($this->type);
    }

    /**
     * Get the type name.
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->getType()->getName();
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
}
