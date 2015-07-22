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
                                'post_title',
                                'post_slug',
                                'post_excerpt',
                                'post_tags',
                                'post_enabled',
                                'post_publish_at',
                                'post_category',
                                'post_author'
                            ]
                        ],
                        'content' => [
                            'title'  => 'module::tab.content',
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
                        'seo'     => [
                            'title'  => 'module::tab.seo',
                            'fields' => [
                                'post_meta_title',
                                'post_meta_keywords',
                                'post_meta_description'
                            ]
                        ],
                        'css'     => [
                            'title'  => 'module::tab.css',
                            'fields' => [
                                'post_css'
                            ]
                        ],
                        'js'      => [
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
