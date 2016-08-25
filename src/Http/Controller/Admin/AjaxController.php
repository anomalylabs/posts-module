<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class AjaxController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AjaxController extends AdminController
{

    /**
     * Return the modal for choosing a post type.
     *
     * @param  TypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function chooseType(TypeRepositoryInterface $types)
    {
        return view('module::admin/ajax/choose_type', ['types' => $types->all()]);
    }
}
