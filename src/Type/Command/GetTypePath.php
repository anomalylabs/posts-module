<?php namespace Anomaly\PostsModule\Type\Command;

use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Illuminate\Routing\UrlGenerator;

/**
 * Class GetTypePath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class GetTypePath
{

    /**
     * The category instance.
     *
     * @var TypeInterface
     */
    protected $category;

    /**
     * Create a new GetTypePath instance.
     *
     * @param TypeInterface $category
     */
    public function __construct(TypeInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Handle the command.
     *
     * @param  UrlGenerator $url
     * @return string
     */
    public function handle(UrlGenerator $url)
    {
        return $url->route('anomaly.module.posts::types.view', ['slug' => $this->category->getSlug()]);
    }
}
