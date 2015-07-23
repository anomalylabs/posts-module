<?php namespace Anomaly\PostsModule\Category\Command;

use Anomaly\PostsModule\Category\Contract\CategoryInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetCategoryPath
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
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

    public function handle(SettingRepositoryInterface $settings)
    {
        return $settings->get('anomaly.module.posts::module_segment', 'posts')
        . '/' . $settings->get('anomaly.module.posts::category_segment', 'category')
        . '/' . $this->category->getSlug();;
    }
}
