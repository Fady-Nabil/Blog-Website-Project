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

Route::get('/', function () {
    return view('welcome');
});

/* start routes for auth register and login */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* end routes for auth register and login */

Route::get('/post/{id}', ['as' => 'home.post', 'uses' => 'AdminPostsController@post']);


/****** start routes for admin *******/

/*
    -route for all admin users to display pages =>(index,create,edit,delete)
    -And middleware to make security and prevent any users except admin from
    accessing admin panel.
*/

Route::group(['middleware' => 'admin'], function(){
    /* route to display index of admin*/
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/media', 'AdminMediasController');
    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comments/replies', 'CommentRepliesController');
});

/****** end routes for admin *******/

/****** start routes for Auth users *******/
Route::group(['middleware' => 'auth'], function(){
    Route::post('comment/reply/','CommentRepliesController@createReply');
});
/****** end routes for Auth users *******/