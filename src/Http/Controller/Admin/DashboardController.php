<?php namespace Anomaly\BlogModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class DashboardController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Http\Controller\Admin
 */
class DashboardController extends AdminController
{

    /**
     * Redirect to posts for now.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        return redirect('admin/blog/posts');
    }
}
