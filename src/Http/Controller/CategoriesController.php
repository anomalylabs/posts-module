<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Category\Command\AddCategoryBreadcrumb;
use Anomaly\PostsModule\Category\Command\AddCategoryMetaTitle;
use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\PostsModule\Post\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class CategoriesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
    public function index(CategoryRepositoryInterface $categories, PostRepositoryInterface $posts, $category)
    {
        if (!$category = $categories->findBySlug($category)) {
            abort(404);
        }

        $this->dispatch(new AddPostsBreadcrumb());
        $this->dispatch(new AddCategoryBreadcrumb($category));
        $this->dispatch(new AddCategoryMetaTitle($category));

        $posts = $posts->findManyByCategory($category);

        return view('anomaly.module.posts::categories/index', compact('category', 'posts'));
    }
}
