<?php namespace Anomaly\BlogsModule\Post\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class PostFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogsModule\Post\Form
 */
class PostFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\BlogsModule\Post\PostModel';

}
