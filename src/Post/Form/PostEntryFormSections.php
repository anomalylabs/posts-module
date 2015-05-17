<?php namespace Anomaly\PostsModule\Post\Form;

use Anomaly\PostsModule\Post\PostModel;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class PostEntryFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Form
 */
class PostEntryFormSections
{

    /**
     * Handle the form sections.
     *
     * @param PostEntryFormBuilder $builder
     */
    public function handle(PostEntryFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'tabs' => [
                        'general' => [
                            'title'  => 'module::tab.post',
                            'fields' => [
                                'title',
                                'slug',
                                'enabled',
                                'publish_at',
                                'author',
                                'category'
                            ]
                        ],
                        'entry'   => [
                            'title'  => 'module::tab.entry',
                            'fields' => function (PostEntryFormBuilder $builder) {
                                return array_map(
                                    function (FieldType $field) {
                                        return $field->getField();
                                    },
                                    array_filter(
                                        $builder->getFormFields()->all(),
                                        function (FieldType $field) {
                                            return (!$field->getEntry() instanceof PostModel);
                                        }
                                    )
                                );
                            }
                        ],
                        'seo'     => [
                            'title'  => 'module::tab.seo',
                            'fields' => [
                                'meta_title',
                                'meta_keywords',
                                'meta_description'
                            ]
                        ],
                        'css'     => [
                            'title'  => 'module::tab.css',
                            'fields' => [
                                'css'
                            ]
                        ],
                        'js'      => [
                            'title'  => 'module::tab.js',
                            'fields' => [
                                'js'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
