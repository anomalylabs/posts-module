<?php namespace Anomaly\BlogsModule\Blog\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class BlogFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Blog\Form
 */
class BlogFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\BlogsModule\Blog\BlogModel';

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'name',
        'slug',
        'description'
    ];

}
