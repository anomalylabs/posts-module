<?php namespace Anomaly\BlogModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class PostTypesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Http\Controller\Admin
 */
class PostTypesController extends AdminController
{

    /**
     * Choose what type of post to create.
     *
     * @return \Illuminate\View\View
     */
    public function choose()
    {
        return view('module::admin/types/choose');
    }
}
