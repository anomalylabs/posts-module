<?php namespace Anomaly\BlogsModule\Http\Controller;

use Anomaly\BlogsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Http\Request;

/**
 * Class CategoriesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Http\Controller
 */
class CategoriesController extends PublicController
{

    /**
     * Return an index of category posts.
     *
     * @param CategoryRepositoryInterface $categories
     * @param Request                     $request
     * @return \Illuminate\View\View
     */
    public function posts(CategoryRepositoryInterface $categories, Request $request)
    {
        $category = $categories->findBySlug($request->segment(3));

        return view('anomaly.module.blogs::categories/posts', compact('category'));
    }
}
