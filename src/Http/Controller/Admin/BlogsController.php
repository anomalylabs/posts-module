<?php namespace Anomaly\BlogsModule\Http\Controller\Admin;

use Anomaly\BlogsModule\Blog\Contract\BlogRepositoryInterface;
use Anomaly\BlogsModule\Blog\Form\BlogFormBuilder;
use Anomaly\BlogsModule\Blog\Table\BlogTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class BlogsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Http\Controller\Admin
 */
class BlogsController extends AdminController
{

    /**
     * Return an index of existing blogs.
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

    public function choose(BlogRepositoryInterface $blogs)
    {
        $blogs = $blogs->enabled();

        return view('module::admin/blogs/choose', compact('blogs'));
    }
}
