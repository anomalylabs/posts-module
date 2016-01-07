<?php namespace Anomaly\PostsModule\Post\Form;

use Carbon\Carbon;
use Illuminate\Auth\Guard;

/**
 * Class PostFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Form
 */
class PostFormFields
{

    /**
     * Handle the form fields.
     *
     * @param Guard           $auth
     * @param PostFormBuilder $builder
     */
    public function handle(Guard $auth, PostFormBuilder $builder)
    {
        $builder->setFields(
            [
                '*',
                'author'     => [
                    'config' => [
                        'default_value' => $auth->id()
                    ]
                ],
                'publish_at' => [
                    'config' => [
                        'default_value' => Carbon::now()
                    ]
                ]
            ]
        );
    }
}
