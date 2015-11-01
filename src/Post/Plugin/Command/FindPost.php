<?php namespace Anomaly\PostsModule\Post\Plugin\Command;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;

/**
 * Class FindPost
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Post\Plugin\Command
 */
class FindPost
{

    /**
     * The identifier.
     *
     * @var array
     */
    protected $identifier;

    /**
     * Create a new FindPost command.
     *
     * @param $identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param PostRepositoryInterface $posts
     * @return PostInterface|null
     */
    public function handle(PostRepositoryInterface $posts)
    {
        if (is_numeric($this->identifier)) {
            return $posts->find($this->identifier);
        }

        return $posts->findBySlug($this->identifier);
    }
}
