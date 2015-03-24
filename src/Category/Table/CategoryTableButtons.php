<?php namespace Anomaly\BlogModule\Category\Table;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;

/**
 * Class CategoryTableButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Category\Table
 */
class CategoryTableButtons
{

    /**
     * Handle the table columns.
     *
     * @param CategoryTableBuilder $builder
     */
    public function handle(CategoryTableBuilder $builder, SettingRepositoryInterface $settings)
    {
        $base = $settings->get('anomaly.module.blog::category_base', 'category');

        $builder->setButtons(
            [
                'edit',
                [
                    'button' => 'view',
                    'target' => '_blank',
                    'href'   => $base . '/{entry.slug}'
                ]
            ]
        );
    }
}
