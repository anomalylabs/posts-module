<?php namespace Anomaly\PostsModule\Command;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Factory;

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
     * @param Filesystem                 $files
     * @param Factory                    $view
     */
    public function handle(
        SettingRepositoryInterface $settings,
        Application $application,
        Filesystem $files,
        Factory $view
    ) {
        $files->makeDirectory($application->getStoragePath('posts'), 0777, true, true);

        $files->put(
            $application->getStoragePath('posts/routes.php'),
            app('Anomaly\Streams\Platform\Support\String')->render(
                $view->make(
                    'anomaly.module.posts::stubs/routes.twig',
                    [
                        'tag_segment'         => $settings->get('anomaly.module.posts::tag_segment', 'tag'),
                        'module_segment'      => $settings->get('anomaly.module.posts::module_segment', 'posts'),
                        'category_segment'    => $settings->get('anomaly.module.posts::category_segment', 'category'),
                        'permalink_structure' => $settings->get(
                            'anomaly.module.posts::permalink_structure',
                            '{year}/{month}/{day}/{post}'
                        ),
                    ]
                )->render()
            )
        );
    }
}
