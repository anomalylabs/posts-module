<?php namespace Anomaly\BlogModule\PostType\Table;

use Anomaly\Streams\Platform\Addon\Addon;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class PostTypeTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\PostType\Table
 */
class PostTypeTableButtons extends TableBuilder
{

    /**
     * Handle the table buttons.
     *
     * @param PostTypeTableBuilder $builder
     */
    public function handle(PostTypeTableBuilder $builder)
    {
        $builder->setButtons(
            [
                [
                    'icon' => 'settings',
                    'text' => 'module::button.customize',
                    'href' => function (Addon $entry) {
                        return url('admin/blog/post_types/customize/' . $entry->getNamespace());
                    }
                ]
            ]
        );
    }
}
