<?php

Route::any('posts', 'Anomaly\PostsModule\Http\Controller\PostsController@index');
Route::any('posts/tag/{tag}', 'Anomaly\PostsModule\Http\Controller\TagsController@index');
Route::any('posts/preview/{id}', 'Anomaly\PostsModule\Http\Controller\PostsController@preview');
Route::any('posts/category/{category}', 'Anomaly\PostsModule\Http\Controller\CategoriesController@index');
Route::any('posts/{year}/{month}/{day}/{post}', 'Anomaly\PostsModule\Http\Controller\PostsController@show');