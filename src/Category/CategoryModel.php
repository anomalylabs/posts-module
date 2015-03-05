<?php namespace Anomaly\BlogModule\Category;

use Anomaly\BlogModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Model\Blog\BlogCategoriesEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CategoryModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Category
 */
class CategoryModel extends BlogCategoriesEntryModel implements CategoryInterface
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
        return $this->hasMany('Anomaly\BlogModule\Post\PostModel', 'category_id');
    }
}
