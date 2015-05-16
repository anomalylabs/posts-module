<?php namespace Anomaly\PostsModule\Post\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class PostFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Form
 */
class PostFormBuilder extends FormBuilder
{

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\PostsModule\Post\PostModel';

    /**
     * The post fields.
     *
     * @var array
     */
    protected $fields = [
        'category',
        'enabled',
        'title',
        'slug',
        'content',
        'publish_at',
        'tags'
    ];

}
