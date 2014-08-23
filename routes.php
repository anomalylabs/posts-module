<?php

// Admin Routes
Route::get('admin/blog', 'Addon\Module\Blog\Controller\Admin\PostsController@index');
Route::any('admin/blog/create', 'Addon\Module\Blog\Controller\Admin\PostsController@create');

// Public Routes
Route::get('blog', 'Addon\Module\Blog\Controller\PostsController@index');