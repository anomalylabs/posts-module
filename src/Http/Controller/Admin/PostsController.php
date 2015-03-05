<?php namespace Anomaly\BlogModule\Http\Controller\Admin;

use Anomaly\BlogModule\Post\Form\PostFormBuilder;
use Anomaly\BlogModule\Post\Table\PostTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class PostsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Http\Controller\Admin
 */
class PostsController extends AdminController
{

    /**
     * Return an index of existing posts.
     *
     * @param PostTableBuilder $table
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(PostTableBuilder $table, $blog = null)
    {
        return $table->render();
    }

    /**
     * Return a form for a new post.
     *
     * @param PostFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(PostFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Returns a form for an existing post.
     *
     * @param PostFormBuilder $form
     * @param                 $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(PostFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
