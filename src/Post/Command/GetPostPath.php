<?php namespace Anomaly\PostsModule\Post\Command;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Support\Parser;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetPostPath
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Command
 */
class GetPostPath implements SelfHandling
{

    /**
     * The post instance.
     *
     * @var PostInterface
     */
    protected $post;

    /**
     * Return the path for a post.
     *
     * @param PostInterface $post
     */
    public function __construct(PostInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Handle the command.
     *
     * @param SettingRepositoryInterface $settings
     * @param Parser                     $parser
     * @return string
     */
    public function handle(SettingRepositoryInterface $settings, Parser $parser)
    {
        $base = $settings->value('anomaly.module.posts::module_segment', 'posts');

        if (!$this->post->isEnabled()) {
            return $base . '/preview/' . $this->post->getStrId();
        }

        $permalink = $settings->value(
            'anomaly.module.posts::permalink_structure',
            [
                'year',
                'month',
                'day',
                'post'
            ]
        );

        $permalink = implode('}/{', $permalink);

        $data = [
            'year'  => $this->post->publish_at->format('Y'),
            'month' => $this->post->publish_at->format('m'),
            'day'   => $this->post->publish_at->format('d'),
            'post'  => $this->post->getSlug()
        ];

        return $parser->parse($base . '/' . "{{$permalink}}", $data);
    }
}
