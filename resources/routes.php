<?php

Route::any('posts', 'Anomaly\PostsModule\Http\Controller\PostsController@index');
Route::any('posts/tag/{tag}', 'Anomaly\PostsModule\Http\Controller\TagsController@posts');
Route::any('posts/category/{category}', 'Anomaly\PostsModule\Http\Controller\CategoriesController@posts');
Route::any('posts/{year}/{month}/{day}/{post}', 'Anomaly\PostsModule\Http\Controller\PostsController@show');