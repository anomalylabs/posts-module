<?php namespace Anomaly\BlogModule\Http\Controller\Admin;

use Anomaly\BlogModule\PostType\Table\PostTypeTableBuilder;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
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
     * Return an index of post types.
     *
     * @param PostTypeTableBuilder $table
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function index(PostTypeTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Choose what type of post to create.
     *
     * @param ExtensionCollection $extensions
     * @return \Illuminate\View\View
     */
    public function choose(ExtensionCollection $extensions)
    {
        $types = $extensions->search('anomaly.module.blog::post_type.*');

        return view('module::admin/post_types/choose', compact('types'));
    }
}
