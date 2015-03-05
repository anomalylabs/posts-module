<?php namespace Anomaly\BlogModule\Blog\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class BlogFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Blog\Form
 */
class BlogFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\BlogModule\Blog\BlogModel';

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'name',
        'slug',
        'description',
        'allowed_roles',
        'theme_layout'
    ];

}
