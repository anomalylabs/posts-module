<?php namespace Anomaly\PostsModule\Type\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class TypeFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Type\Form
 */
class TypeFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        '*',
        'slug' => [
            'disabled' => 'edit'
        ]
    ];

}
