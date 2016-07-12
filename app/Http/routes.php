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

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
	$task->delete();

	return redirect('/');
});


