<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;

/**
 * Class CategoriesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller
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
        if (!$category = $categories->findBySlug($category)) {
            abort(404);
        }

        $posts = $posts->findManyByCategory($category);

        return view('anomaly.module.posts::categories/posts', compact('category', 'posts'));
    }
}
