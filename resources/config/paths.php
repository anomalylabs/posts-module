<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module
    |--------------------------------------------------------------------------
    |
    | Specify the front end module path.
    |
    | i.e. 'posts' yields http://yoursite.com/posts
    |
    */

    'module' => 'posts',

    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    |
    | Specify the front end category path.
    |
    | i.e. 'category' yields http://yoursite.com/posts/category/{category}
    |
    */

    'category' => 'category',

    /*
    |--------------------------------------------------------------------------
    | Tags
    |--------------------------------------------------------------------------
    |
    | Specify the front end tag path.
    |
    | i.e. 'category' yields http://yoursite.com/posts/tag/{tag}
    |
    */

    'tag' => 'tag',

    /*
    |--------------------------------------------------------------------------
    | Permalink
    |--------------------------------------------------------------------------
    |
    | Specify the post permalink pattern. This value supports handlers,
    | closures, and value strings.
    |
    */

    'permalink' => function (\Anomaly\PostsModule\Post\Contract\PostInterface $post) {
        return $post->getDate()->format('Y/m/d/') . $post->getSlug();
    },

    /*
    |--------------------------------------------------------------------------
    | Route
    |--------------------------------------------------------------------------
    |
    | The route is simple the route pattern equivalent to the permalink
    | you specify. The route MUST have '{post}' present in it.
    |
    */

    'route' => '{year}/{month}/{day}/{post}'

];
