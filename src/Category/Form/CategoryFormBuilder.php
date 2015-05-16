<?php namespace Anomaly\PostsModule\Category\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class CategoryFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Category\Form
 */
class CategoryFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\PostsModule\Category\CategoryModel';

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
