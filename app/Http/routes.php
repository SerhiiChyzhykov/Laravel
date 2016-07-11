<?php

use App\Category;
use App\Photos;
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
	$photos = DB::table('photos as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )->paginate(1);


    return view('home', [
        'photos' => $photos,

    ]);
});


/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});
Route::auth();

Route::get('/home', function (){
$photos = DB::table('photos as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )->paginate(1);
    return view('home', [
        'photos' => $photos,

    ]);
});

Route::auth();

Route::get('/home', function (){
$photos = DB::table('photos as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )->paginate(1);
    return view('home', [
        'photos' => $photos,

    ]);
});
