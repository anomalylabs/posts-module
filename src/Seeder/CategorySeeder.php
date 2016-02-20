<?php namespace Anomaly\PostsModule\Seeder;

use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class CategorySeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PostsModule\Seeder
 */
class CategorySeeder extends Seeder
{

    /**
     * The category repository.
     *
     * @var CategoryRepositoryInterface
     */
    protected $categories;

    /**
     * Create a new CategorySeeder instance.
     *
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->categories->truncate();

        $this->categories->create(
            [
                'en'   => [
                    'name'        => 'News',
                    'description' => 'Company news and updates.'
                ],
                'slug' => 'news'
            ]
        );
    }
}
