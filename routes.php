<?php

// Admin Routes
Route::get('admin/blog', 'Streams\Addon\Module\Blog\Controller\Admin\PostsController@index');
Route::any('admin/blog/create', 'Streams\Addon\Module\Blog\Controller\Admin\PostsController@create');

// Public Routes
Route::get('blog', 'Streams\Addon\Module\Blog\Controller\PostsController@index');