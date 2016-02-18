<?php namespace Anomaly\PostsModule\Post\Form;

use Anomaly\PostsModule\Post\PostModel;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class PostEntryFormSections
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
                'general'      => [
                    'fields' => [
                        'post_title',
                        'post_slug',
                        'post_summary'
                    ]
                ],
                'fields'       => [
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
                'organization' => [
                    'fields' => [
                        'post_category',
                        'post_tags'
                    ]
                ],
                'seo'          => [
                    'fields' => [
                        'post_meta_title',
                        'post_meta_keywords',
                        'post_meta_description'
                    ]
                ],
                'options'      => [
                    'fields' => [
                        'post_author',
                        'post_enabled',
                        'post_featured',
                        'post_publish_at'
                    ]
                ]
            ]
        );
    }
}
