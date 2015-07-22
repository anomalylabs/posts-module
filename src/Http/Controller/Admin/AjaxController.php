<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class AjaxController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller\Admin
 */
class AjaxController extends AdminController
{

    /**
     * Return the modal for choosing a post type.
     *
     * @param TypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function chooseType(TypeRepositoryInterface $types)
    {
        return view('module::admin/ajax/choose_type', ['types' => $types->all()]);
    }
}
