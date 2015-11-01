<?php namespace Anomaly\PostsModule\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class AddPostsBreadcrumb
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Command
 */
class AddPostsBreadcrumb implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param BreadcrumbCollection       $breadcrumbs
     */
    public function handle(SettingRepositoryInterface $settings, BreadcrumbCollection $breadcrumbs)
    {
        $breadcrumbs->add(
            'anomaly.module.posts::addon.name',
            $settings->value('anomaly.module.posts::module_segment', 'posts')
        );
    }
}
