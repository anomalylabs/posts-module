<?php namespace Anomaly\BlogModule\Http\Controller;

use Anomaly\BlogModule\Category\Contract\CategoryRepositoryInterface;
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
     * @param Request                     $request
     * @return \Illuminate\View\View
     */
    public function posts(CategoryRepositoryInterface $categories, Request $request)
    {
        $category = $categories->findBySlug($request->segment(3));

        return view('anomaly.module.blog::categories/posts', compact('category'));
    }
}
