<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\PostsModule\Category\Form\CategoryFormBuilder;
use Anomaly\PostsModule\Category\Tree\CategoryTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Support\Authorizer;

/**
 * Class CategoriesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller\Admin
 */
class CategoriesController extends AdminController
{

    /**
     * Return an index of existing categories.
     *
     * @param CategoryTreeBuilder $table
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryTreeBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create the form for creating a new category.
     *
     * @param CategoryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(CategoryFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for editing an existing category.
     *
     * @param CategoryFormBuilder $form
     * @param                     $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(CategoryFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Delete a category.
     *
     * @param CategoryRepositoryInterface $categories
     * @param Authorizer                  $authorizer
     * @param                             $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(CategoryRepositoryInterface $categories, Authorizer $authorizer, $id)
    {
        $authorizer->authorize('anomaly.module.posts::categories.delete');

        $categories->delete($categories->find($id));

        return redirect()->back();
    }
}
