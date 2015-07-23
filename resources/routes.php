<?php

Route::any(
    'posts',
    ['uses' => 'Anomaly\PostsModule\Http\Controller\PostsController@index', 'streams::addon' => 'anomaly.module.posts']
);
Route::any(
    'posts/tag/{tag}',
    ['uses' => 'Anomaly\PostsModule\Http\Controller\TagsController@index', 'streams::addon' => 'anomaly.module.posts']
);
Route::any(
    'posts/preview/{id}',
    [
        'uses'           => 'Anomaly\PostsModule\Http\Controller\PostsController@preview',
        'streams::addon' => 'anomaly.module.posts'
    ]
);
Route::any(
    'posts/category/{category}',
    [
        'uses'           => 'Anomaly\PostsModule\Http\Controller\CategoriesController@index',
        'streams::addon' => 'anomaly.module.posts'
    ]
);
Route::any(
    'posts/{year}/{month}/{day}/{post}',
    ['uses' => 'Anomaly\PostsModule\Http\Controller\PostsController@show', 'streams::addon' => 'anomaly.module.posts']
);