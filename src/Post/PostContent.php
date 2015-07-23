<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Illuminate\View\Factory;
use Robbo\Presenter\Decorator;

class PostContent
{

    /**
     * The view factory.
     *
     * @var Factory
     */
    protected $view;

    /**
     * The decorator utility.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * Create a new PostContent instance.
     *
     * @param Factory   $view
     * @param Decorator $decorator
     */
    public function __construct(Factory $view, Decorator $decorator)
    {
        $this->view      = $view;
        $this->decorator = $decorator;
    }

    /**
     * Make the view content.
     *
     * @param PostInterface $p
     */
    public function make(PostInterface $post)
    {
        $post->setContent($this->view->make($post->getLayoutViewPath(), compact('post'))->render());
    }
}
