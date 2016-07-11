<?php

use App\Category;
use App\Photos;

use Illuminate\Http\Request;


Route::auth();

Route::get('/', function (){
	$photos = DB::table('photos as p')
	->join('categories as c', 'p.category_id', '=', 'c.id')
	->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )->paginate(1);
	if(Auth::user()):
		$counts = DB::table('photos')
	->where('user_id', Auth::user()->id)
	->count();
	else:
		$counts ='';
	endif;
	return view('home', [
		'counts' => $counts,
		'photos' => $photos,
		]);
});

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
	$task->delete();

	return redirect('/');
});

Route::post('adds', function (Request $request) {


	$validator = Validator::make($request->all(), [
		'title' => 'required|max:255',
		'description' => 'required|max:255',
		'categories'  => 'required|max:255',
		]);
	if ($validator->fails()) {
		return redirect('add')
		->withInput()
		->withErrors($validator);
	}
	else {
    // checking file is valid.
		if ($request->file('image')->isValid()) {
      $destinationPath = 'uploads'; // upload path
      $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
      $fileName = md5(microtime() . rand(0, 9999)).'.'.$extension; // renameing image
      $files = $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
      $photos = new Photos;
      $photos->title = $request->title;
      $photos->description = $request->description;
      $photos->category_id = $request->categories;
      $photos->user_id = Auth::user()->id;
      $photos->images = $files;
      $photos->save();
      Session::flash('success', 'Upload successfully'); 
      return Redirect::to('add');
  }
  else {
  	Session::flash('error', 'uploaded file is not valid');
  	return Redirect::to('add');
  }
}


});

/**
 * Add New Task
 */
Route::get('/add', function (Request $request) {
	
	$category = DB::table('categories')
	->get();
	if(Auth::user()):
		$counts = DB::table('photos')
	->where('user_id', Auth::user()->id)
	->count();
	else:
		$counts ='';
	endif;
	$file = '';
	return view('photos/add', [
		'counts' => $counts,
		'category' =>$category,
		'file' =>$file 
		]);
});