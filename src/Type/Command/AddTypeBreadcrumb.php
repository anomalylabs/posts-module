<?php namespace Anomaly\PostsModule\Type\Command;

use Anomaly\PostsModule\Type\Command\GetTypePath;
use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class AddTypeBreadcrumb
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class AddTypeBreadcrumb
{
    /**
     * The type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new AddTypeBreadcrumb instance.
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
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function handle(BreadcrumbCollection $breadcrumbs)
    {
        $breadcrumbs->add(
            $this->type->getName(),
            dispatch_sync(new GetTypePath($this->type))
        );
    }
}
