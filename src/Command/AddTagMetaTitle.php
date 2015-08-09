<?php namespace Anomaly\PostsModule\Command;

use Anomaly\Streams\Platform\View\ViewTemplate;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class AddTagMetaTitle
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Command
 */
class AddTagMetaTitle implements SelfHandling
{

    /**
     * The tag string.
     *
     * @var string
     */
    protected $tag;

    /**
     * Create a new AddTagMetaTitle instance.
     *
     * @param string $tag
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Handle the command.
     *
     * @param ViewTemplate $template
     */
    public function handle(ViewTemplate $template)
    {
        $template->set('meta_title', trans('anomaly.module.posts::breadcrumb.tagged', ['tag' => $this->tag]));
    }
}
