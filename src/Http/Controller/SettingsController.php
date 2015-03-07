<?php namespace Anomaly\BlogModule\Http\Controller;

use Anomaly\SettingsModule\Setting\Form\SettingFormBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class SettingsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Http\Controller
 */
class SettingsController extends AdminController
{

    /**
     * Return a form to modify settings for the blog module.
     *
     * @param SettingFormBuilder $settings
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(SettingFormBuilder $settings)
    {
        return $settings->render('anomaly.module.blog');
    }
}
