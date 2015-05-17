<?php namespace Anomaly\PostsModule\Post\Form\Command;

use Anomaly\PostsModule\Post\Form\PostEntryFormBuilder;
use Anomaly\PostsModule\Post\Form\PostFormBuilder;
use Anomaly\PostsModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;

/**
 * Class AddPostFormFromRequest
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Form\Command
 */
class AddPostFormFromRequest implements SelfHandling
{

    /**
     * The multiple form builder.
     *
     * @var PostEntryFormBuilder
     */
    protected $builder;

    /**
     * Create a new AddPostFormFromRequest instance.
     *
     * @param PostEntryFormBuilder $builder
     */
    public function __construct(PostEntryFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param TypeRepositoryInterface $types
     * @param PostFormBuilder         $builder
     * @param Request                 $request
     */
    public function handle(TypeRepositoryInterface $types, PostFormBuilder $builder, Request $request)
    {
        $this->builder->addForm('post', $builder->setType($types->find($request->get('type'))));
    }
}
