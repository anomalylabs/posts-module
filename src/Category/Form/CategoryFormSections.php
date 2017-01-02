<?php namespace Anomaly\PostsModule\Category\Form;

/**
 * Class CategoryFormSections
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CategoryFormSections
{

    /**
     * Handle the sections.
     *
     * @param CategoryFormBuilder $builder
     */
    public function handle(CategoryFormBuilder $builder)
    {
        $stream = $builder->getFormStream();

        $fields = $stream
            ->getAssignments()
            ->unlocked()
            ->fieldSlugs();

        $builder->setSections(
            [
                'general' => [
                    'fields' => [
                        'name',
                        'slug',
                        'description',
                    ],
                ],
                'content' => [
                    'fields' => $fields,
                ],
            ]
        );
    }
}
