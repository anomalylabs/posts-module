<?php namespace Anomaly\PostsModule\Command;

use Anomaly\PostsModule\PostsModule;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;

/**
 * Class GenerateRoutesFile
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Command
 */
class GenerateRoutesFile implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param Application                $application
     * @param PostsModule                $module
     * @param Filesystem                 $files
     */
    public function handle(
        SettingRepositoryInterface $settings,
        Application $application,
        PostsModule $module,
        Filesystem $files
    ) {
        $files->makeDirectory($application->getStoragePath('posts'), 0777, true, true);

        $files->put(
            $application->getStoragePath('posts/routes.php'),
            app('Anomaly\Streams\Platform\Support\String')->render(
                $files->get($module->getPath('resources/assets/routes.stub')),
                [
                    'module'    => $settings->get('anomaly.module.posts::module_base', 'posts'),
                    'tag'       => $settings->get('anomaly.module.posts::tag_base', 'tag'),
                    'category'  => $settings->get('anomaly.module.posts::category_base', 'category'),
                    'permalink' => $settings->get(
                        'anomaly.module.posts::permalink_structure',
                        '{year}/{month}/{day}/{post}'
                    ),
                ]
            )
        );
    }
}
