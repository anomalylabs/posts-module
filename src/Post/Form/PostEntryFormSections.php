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
                        'general'  => [
                            'title'  => 'module::tab.post',
                            'fields' => [
                                'post_title',
                                'post_slug',
                                'post_summary'
                            ]
                        ],
                        'fields'  => [
                            'title'  => 'module::tab.fields',
                            'fields' => function (PostEntryFormBuilder $builder) {
                                return array_map(
                                    function (FieldType $field) {
                                        return 'entry_' . $field->getField();
                                    },
                                    array_filter(
                                        $builder->getFormFields()->base()->all(),
                                        function (FieldType $field) {
                                            return (!$field->getEntry() instanceof PostModel);
                                        }
                                    )
                                );
                            }
                        ],
                        'organization'  => [
                            'title'  => 'module::tab.organization',
                            'fields' => [
                                'post_category',
                                'post_tags'
                            ]
                        ],
                        'seo'      => [
                            'title'  => 'module::tab.seo',
                            'fields' => [
                                'post_meta_title',
                                'post_meta_keywords',
                                'post_meta_description'
                            ]
                        ],
                        'options'  => [
                            'title'  => 'module::tab.options',
                            'fields' => [
                                'post_live',
                                'post_featured',
                                'post_allow_comments',
                                'post_author',
                                'post_publish_at'
                            ]
                        ],
                        'advanced' => [
                            'title'  => 'module::tab.advanced',
                            'fields' => [
                                'post_ttl'
                            ]
                        ],
                        'css'      => [
                            'title'  => 'module::tab.css',
                            'fields' => [
                                'post_css'
                            ]
                        ],
                        'js'       => [
                            'title'  => 'module::tab.js',
                            'fields' => [
                                'post_js'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
