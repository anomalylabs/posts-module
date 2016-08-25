<?php namespace Anomaly\PostsModule\Category\Command;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\View\ViewTemplate;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AddCategoryMetaTitle
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddCategoryMetaTitle
{

    use DispatchesJobs;

    /**
     * The category instance.
     *
     * @var CategoryInterface
     */
    protected $category;

    /**
     * Create a new AddCategoryMetaTitle instance.
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
     * @param ViewTemplate $template
     */
    public function handle(ViewTemplate $template)
    {
        $template->set('meta_title', $this->category->getName());
    }
}
