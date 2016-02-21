<?php namespace Anomaly\PostsModule\Type\Command;

use Anomaly\PostsModule\Post\Contract\PostRepositoryInterface;
use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class DeletePosts
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PostsModule\Type\Command
 */
class DeletePosts implements SelfHandling
{

    /**
     * The post type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new DeleteTypeStream instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param PostRepositoryInterface $posts
     */
    public function handle(PostRepositoryInterface $posts)
    {
        foreach ($this->type->getPosts() as $post) {
            $posts->forceDelete($post);
        }
    }
}
