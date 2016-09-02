<?php namespace Anomaly\PostsModule\Type\Form;

/**
 * Class TypeFormSections
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PostsModule\Type\Form
 */
class TypeFormSections
{

    /**
     * Handle the section.
     *
     * @param TypeFormBuilder $builder
     */
    public function handle(TypeFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'fields' => [
                        'name',
                        'slug',
                        'description'
                    ]
                ],
                'layout'  => [
                    'fields' => [
                        'theme_layout',
                        'layout'
                    ]
                ]
            ]
        );
    }
}
