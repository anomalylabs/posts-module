<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Post\Contract\PostInterface;
use Anomaly\Streams\Platform\Support\Authorizer;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class PostAuthorizer
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PostAuthorizer
{

    /**
     * The authorization utility.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The authorizer utility.
     *
     * @var Authorizer
     */
    protected $authorizer;

    /**
     * Create a new PostAuthorizer instance.
     *
     * @param Guard      $guard
     * @param Authorizer $authorizer
     */
    public function __construct(Guard $guard, Authorizer $authorizer)
    {
        $this->guard      = $guard;
        $this->authorizer = $authorizer;
    }

    /**
     * Authorize the post.
     *
     * @param PostInterface $post
     */
    public function authorize(PostInterface $post)
    {
        /* @var UserInterface $user */
        $user = $this->guard->user();

        if (!$post->isEnabled() && !$user) {
            abort(404);
        }

        if ($post->isEnabled() && $post->isPreview() && !$this->authorizer->authorize('anomaly.module.posts::posts.preview')) {
            abort(403);
        }
    }
}
