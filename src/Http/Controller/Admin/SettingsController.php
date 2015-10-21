<?php namespace Anomaly\PostsModule\Http\Controller\Admin;

use Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SettingsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Http\Controller
 */
class SettingsController extends AdminController
{

    /**
     * Return a form to edit settings for the posts module.
     *
     * @param SettingFormBuilder $settings
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(SettingFormBuilder $settings)
    {
        return $settings->render('anomaly.module.posts');
    }
}
