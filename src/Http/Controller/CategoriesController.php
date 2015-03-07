<?php namespace Anomaly\BlogModule\Http\Controller;

use Anomaly\BlogModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\BlogModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;

/**
 * Class CategoriesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Http\Controller
 */
class CategoriesController extends PublicController
{

    /**
     * Return an index of category posts.
     *
     * @param CategoryRepositoryInterface $categories
     * @param PostRepositoryInterface     $posts
     * @param                             $category
     * @return \Illuminate\View\View
     */
    public function posts(CategoryRepositoryInterface $categories, PostRepositoryInterface $posts, $category)
    {
        $category = $categories->findBySlug($category);
        $posts    = $posts->findManyByCategory($category);

        return view('anomaly.module.blog::categories/posts', compact('category', 'posts'));
    }
}
