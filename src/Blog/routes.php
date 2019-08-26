<?php
/*
|--------------------------------------------------------------------------
| Blog API Routes
|--------------------------------------------------------------------------
*/


Route::get('/blog', 'SwiftDesign\Swift\Blog\BlogController@getBlogMain');
Route::get('/blog/{user_key}/single/{post_id}','SwiftDesign\Swift\Blog\BlogController@getBlogSingle');
Route::get('/blog/category/{category}','SwiftDesign\Swift\Blog\BlogController@getBlogsCategory');
