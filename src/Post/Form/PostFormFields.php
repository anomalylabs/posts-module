<?php namespace Anomaly\BlogsModule\Post\Form;

use Illuminate\Http\Request;

/**
 * Class PostFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Post\Form
 */
class PostFormFields
{

    /**
     * Handle the fields.
     *
     * @param PostFormBuilder $builder
     */
    public function handle(PostFormBuilder $builder)
    {
        $builder->setFields(
            [
                'blog' => [
                    'value'    => function (Request $request) {
                        return 2;
                    },
                    'disabled' => true
                ],
                'category',
                'title',
                'slug',
                'tags'
            ]
        );
    }
}
