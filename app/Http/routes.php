<?php

use App\Category;
use App\Photos;
use App\Post;

use Illuminate\Http\Request;

Route::auth();

Route::get('/', 'ImgController@Index');

/**
 * Add New Task
 */
Route::get('adds', function() {
  return View::make('add');
});
Route::post('adds', 'ImgController@Upload');

Route::post('messages', 'ImgController@Messages');

Route::get('add', 'ImgController@Add');

Route::get('gallery', 'ImgController@Gallery');

Route::get('gallery/{id}', 'ImgController@GalleryId');

Route::get('photo/{id}', 'ImgController@Images');

Route::get('category/{id}', 'ImgController@Category');

Route::get('categories', 'ImgController@Categories');

Route::get('admin', 'AdminController@Index');

/**
 * Delete Task
 */
Route::delete('/photo/{id}', function (Photos $id) {
	$id->delete();
Session::flash('Successfully', 'Delete successfully');
	return redirect('/');
});

Route::get('photo/{id}/edit', function() {
  return View::make('images');
});
Route::post('photo/{id}/edit', 'ImgController@Edit');