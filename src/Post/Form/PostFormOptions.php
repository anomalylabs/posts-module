<?php namespace Anomaly\BlogModule\Post\Form;

/**
 * Class PostFormOptions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post\Form
 */
class PostFormOptions
{

    /**
     * Handle the form options.
     *
     * @param PostFormBuilder $builder
     */
    public function handle(PostFormBuilder $builder)
    {
        $builder->setFormOption(
            'sections',
            [
                [
                    'title'  => 'module::section.content',
                    'fields' => [
                        'category',
                        'title',
                        'slug',
                        'content',
                        //'excerpt'
                    ]
                ],
                [
                    'title'  => 'module::section.options',
                    'fields' => [
                        'tags',
                        'enabled',
                        //'author',
                        'publish_at',
                        //'allow_comments'
                    ]
                ]
            ]
        );
    }
}
