<?php namespace Anomaly\BlogModule\Post;

use Anomaly\BlogModule\Post\Contract\PostInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Support\Parser;
use Collective\Html\HtmlBuilder;

/**
 * Class PostUrlGenerator
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlogModule\Post
 */
class PostUrlGenerator
{

    /**
     * The HTML utility.
     *
     * @var HtmlBuilder
     */
    protected $html;

    /**
     * The parser utility.
     *
     * @var Parser
     */
    protected $parser;

    /**
     * The setting repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * Create a new PostUrlGenerator instance.
     *
     * @param HtmlBuilder                $html
     * @param Parser                     $parser
     * @param SettingRepositoryInterface $settings
     */
    public function __construct(HtmlBuilder $html, Parser $parser, SettingRepositoryInterface $settings)
    {
        $this->html     = $html;
        $this->parser   = $parser;
        $this->settings = $settings;
    }

    /**
     * Generate a URL for a post.
     *
     * @param PostInterface $post
     */
    public function generate(PostInterface $post)
    {
        $structure = $this->settings->get('anomaly.module.blog::permalink_structure', '{year}/{month}/{day}/{post}');

        $data = [
            'year'  => $post->created_at->format('Y'),
            'month' => $post->created_at->format('m'),
            'day'   => $post->created_at->format('d'),
            'post'  => $post->getSlug()
        ];

        return url($this->parser->parse($structure, $data));
    }
}
