<?php namespace Anomaly\PostsModule\Category;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\Posts\PostsCategoriesEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CategoryModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Category
 */
class CategoryModel extends PostsCategoriesEntryModel implements CategoryInterface
{

    /**
     * The cache time.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Get the related posts.
     *
     * @return EntryCollection
     */
    public function getPosts()
    {
        return $this->posts()->get();
    }

    /**
     * Return the posts relation.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany('Anomaly\PostsModule\Post\PostModel', 'category_id');
    }
}
