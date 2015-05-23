<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\View\ViewTemplate;

/**
 * Class PostLoader
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post
 */
class PostLoader
{

    /**
     * The template data.
     *
     * @var ViewTemplate
     */
    protected $template;

    /**
     * Create a new PostLoader instance.
     *
     * @param ViewTemplate $template
     */
    public function __construct(ViewTemplate $template)
    {
        $this->template = $template;
    }

    /**
     * Load post data to the template.
     *
     * @param PostInterface $post
     */
    public function load(PostInterface $post)
    {
        $this->template->set('title', $post->getTitle());
        $this->template->set('meta_title', $post->metaTitle());
        $this->template->set('meta_keywords', $post->metaKeywords());
        $this->template->set('meta_description', $post->metaDescription());
    }
}
