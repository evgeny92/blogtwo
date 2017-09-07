<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Main routes
 */
Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

/*
 * Posts resource
 */
Route::resource('posts', 'PostController');

/*
 * Categories resource
 */
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

/*
 * Tags resource
 */
Route::resource('tags', 'TagController', ['except' => ['create']]);

/*
 * Comments
 */
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);



/*
 * Slug
 */
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
      ->where('slug', '[\w\d\-\_]+');
/*
 * BlogIndex
 */
Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

/*
 * Routes for Authentication
 */
Auth::routes();
Route::get('logout',  'Auth\LoginController@logout');

