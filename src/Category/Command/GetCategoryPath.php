<?php namespace Anomaly\PostsModule\Category\Command;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;

/**
 * Class GetCategoryPath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PostsModule\Category\Command
 */
class GetCategoryPath implements SelfHandling
{

    /**
     * The category instance.
     *
     * @var CategoryInterface
     */
    protected $category;

    /**
     * Create a new GetCategoryPath instance.
     *
     * @param CategoryInterface $category
     */
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Handle the command.
     *
     * @param Repository $config
     * @return string
     */
    public function handle(Repository $config)
    {
        return $config->get('anomaly.module.posts::paths.module')
        . '/' . $config->get('anomaly.module.posts::paths.category')
        . '/' . $this->category->getSlug();
    }
}
