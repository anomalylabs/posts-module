<?php namespace Anomaly\PostsModule\Command;

use Anomaly\PostsModule\Category\Command\GetCategoryPath;
use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class AddCategoryBreadcrumb
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PostsModule\Command
 */
class AddCategoryBreadcrumb implements SelfHandling
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
