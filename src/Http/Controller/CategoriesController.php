<?php namespace Anomaly\PostsModule\Http\Controller;

use Anomaly\PostsModule\Category\Command\AddCategoryBreadcrumb;
use Anomaly\PostsModule\Category\Command\AddCategoryMetaTitle;
use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\PostsModule\Post\Command\AddPostsBreadcrumb;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;

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
    public function index(CategoryRepositoryInterface $categories, PostRepositoryInterface $posts, SettingRepositoryInterface $settings, $category)
    {
        if (!$category = $categories->findBySlug($category)) {
            abort(404);
        }

        $this->dispatch(new AddPostsBreadcrumb());
        $this->dispatch(new AddCategoryBreadcrumb($category));
        $this->dispatch(new AddCategoryMetaTitle($category));

        $posts = $posts->findManyByCategory($category, $settings->value('anomaly.module.posts::posts_per_page',null));

        return view('anomaly.module.posts::categories/index', compact('category', 'posts'));
    }
}
