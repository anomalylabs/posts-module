<?php namespace Anomaly\BlogModule\Post\Form;

use Illuminate\Http\Request;

/**
 * Class PostFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post\Form
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
                'category',
                'title',
                'slug',
                'tags'
            ]
        );
    }
}
