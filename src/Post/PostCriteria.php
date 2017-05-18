<?php namespace Anomaly\PostsModule\Post;

use Anomaly\PostsModule\Type\Command\GetType;
use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\EntryCriteria;

/**
 * Class PostCriteria
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PostCriteria extends EntryCriteria
{

    /**
     * Return only live.
     *
     * @return $this
     */
    public function live()
    {
        $this->query->where('enabled', true);
        $this->query->where('publish_at', '<=', date('Y-m-d H:i:s'));

        return $this;
    }

    /**
     * Return chronologically.
     *
     * @return $this
     */
    public function recent()
    {
        $this->live();

        $this->query->orderBy('publish_at', 'DESC');

        return $this;
    }

    /**
     * Return only featured.
     *
     * @return $this
     */
    public function featured()
    {
        $this->recent();

        $this->query->where('featured', true);

        return $this;
    }

    /**
     * Add the type constraint.
     *
     * @param $identifier
     * @return $this
     */
    public function type($identifier)
    {
        /* @var TypeInterface $type */
        if (!$type = $this->dispatch(new GetType($identifier))) {
            throw new \Exception('Post type [' . $identifier . '] doesn\'t exist!');
        }

        $stream = $type->getEntryStream();
        $table  = $stream->getEntryTableName();

        $this->query
            ->select('posts_posts.*')
            ->where('type_id', $type->getId())
            ->join($table . ' AS entry', 'entry.id', '=', 'posts_posts.entry_id');

        return $this;
    }
}
