<?php

use App\Category;
use App\Photos;

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
Route::get('add', 'ImgController@Add');


/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
	$task->delete();

	return redirect('/');
});


