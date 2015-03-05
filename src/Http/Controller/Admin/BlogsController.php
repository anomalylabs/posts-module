<?php namespace Anomaly\BlogModule\Http\Controller\Admin;

use Anomaly\BlogModule\Blog\Contract\BlogRepositoryInterface;
use Anomaly\BlogModule\Blog\Form\BlogFormBuilder;
use Anomaly\BlogModule\Blog\Table\BlogTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class BlogController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Http\Controller\Admin
 */
class BlogController extends AdminController
{

    /**
     * Return an index of existing blog.
     *
     * @param BlogTableBuilder $table
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(BlogTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new blog.
     *
     * @param BlogFormBuilder $form
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function create(BlogFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for an existing blog.
     *
     * @param BlogFormBuilder $form
     * @param                 $id
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(BlogFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    public function choose(BlogRepositoryInterface $blog)
    {
        $blog = $blog->enabled();

        return view('module::admin/blog/choose', compact('blog'));
    }
}
