<?php namespace Anomaly\BlogsModule\Http\Controller\Admin;

use Anomaly\BlogsModule\Category\Form\CategoryFormBuilder;
use Anomaly\BlogsModule\Category\Table\CategoryTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class CategoriesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Http\Controller\Admin
 */
class CategoriesController extends AdminController
{

    /**
     * Return an index of existing categories.
     *
     * @param CategoryTableBuilder $table
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(CategoryTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new category.
     *
     * @param CategoryFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(CategoryFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing category.
     *
     * @param CategoryFormBuilder $form
     * @param                     $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(CategoryFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
