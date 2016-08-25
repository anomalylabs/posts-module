<?php namespace Anomaly\PostsModule\Category\Command;

use Anomaly\PostsModule\Category\Command\GetCategoryPath;
use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AddCategoryBreadcrumb
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddCategoryBreadcrumb
{

    use DispatchesJobs;

    /**
     * The category instance.
     *
     * @var CategoryInterface
     */
    protected $category;

    /**
     * Create a new AddCategoryBreadcrumb instance.
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
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function handle(BreadcrumbCollection $breadcrumbs)
    {
        $breadcrumbs->add(
            $this->category->getName(),
            $this->dispatch(new GetCategoryPath($this->category))
        );
    }
}
