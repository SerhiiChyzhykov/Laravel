<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use App\Category;
use App\Photos;
use Auth;
use DB;

class ImgController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Upload(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'title' => 'required|max:255',
    		'description' => 'required|max:255',
    		'categories'  => 'required|max:255',
    		]);
    	if ($validator->fails()):
    		return redirect('add')
    	->withInput()
    	->withErrors($validator);
    	else:
    		if ($request->file('image')->isValid()):
    			$destinationPath = 'uploads'; 
    		$extension = $request->file('image')->getClientOriginalExtension(); 
    		$fileName = md5(microtime() . rand(0, 9999)).'.'.$extension; 
    		$files = $request->file('image')->move($destinationPath, $fileName); 

    		$photos = new Photos;
    		$photos->title = $request->title;
    		$photos->description = $request->description;
    		$photos->category_id = $request->categories;
    		$photos->user_id = Auth::user()->id;
    		$photos->images = $files;
    		$photos->save();

    		Session::flash('Upload successfully', 'Upload successfully'); 
    		return Redirect::to('add');

    		else:
    			Session::flash('error', 'uploaded file is not valid');
    		return Redirect::to('add');
    		endif;
    		endif;
    	}

    	public function Index(Request $request){

    		$perpage = 8 ;

    		if(Auth::user()):
    			$counts = DB::table('photos')
    		->where('user_id', Auth::user()->id)
    		->count();
    		else:
    			$counts ='';
    		endif;

    		if(($search = \Request::get('s') )!== NULL):
    			$photos = DB::table('photos as p')
    		->join('categories as c', 'p.category_id', '=', 'c.id')
    		->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )
    		->where('p.title','like','%'.$search.'%')->paginate($perpage);
    		;

    		return view('home', [
    			'counts' => $counts,
    			'photos' => $photos,
    			]);
    		else:

    			$photos = DB::table('photos as p')
    		->join('categories as c', 'p.category_id', '=', 'c.id')
    		->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )->paginate($perpage);

    		return view('home', [
    			'counts' => $counts,
    			'photos' => $photos,
    			]);
    		endif;
    	}

    	public function Add(Request $request)
    	{
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
    	}

    	public function Gallery(Request $request)
    	{
    		if(Auth::user()):
    			$counts = DB::table('photos')
    		->where('user_id', Auth::user()->id)
    		->count();
    		$perpage = 8;
    		$photos = DB::table('photos as p')
    		->join('categories as c', 'p.category_id', '=', 'c.id')
    		->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )
    		->where('p.user_id', Auth::user()->id)->paginate($perpage);
    		

    		return view('photos/gallery', [
    			'counts' => $counts,
    			'photos' => $photos,
    			]);

    		endif;
    	}

    	public function GalleryId(Request $request)
    	{
    		if(Auth::user()):
    			$counts = DB::table('photos')
    		->where('user_id', Auth::user()->id)
    		->count();
    		else:
    			$counts ="";
    		endif;
    		$perpage = 8;
    		$photos = DB::table('photos as p')
    		->join('categories as c', 'p.category_id', '=', 'c.id')
    		->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )
    		->where('p.user_id', $request->id)->paginate($perpage);

    		return view('photos/gallery', [
    			'counts' => $counts,
    			'photos' => $photos,
    			]);

    		
    	}

    	public function Images(Request $request)
    	{
    		if(Auth::user()):
    			$counts = DB::table('photos')
    		->where('user_id', Auth::user()->id)
    		->count();
    		else:
    			$counts ='';
    		endif;

    		$photos = DB::table('photos')
    		->where('id', $request->id)
    		->get();

    		$category = DB::table('categories')
    		->get();

    		$messages = DB::table('post as p')
    		->join('users as u', 'u.id', '=', 'p.user_id')
    		->select('p.post', 'p.id', 'p.user_id', 'p.photo_id', 'u.id as user_id',  'u.name as username' )
    		->where('p.photo_id', $request->id)->get();;


    		return view('photos/images', [
    			'counts' => $counts,
    			'photos' => $photos,
    			'category' => $category,
    			'messages' => $messages,
    			]);
    	}

    	public function Categories(Request $request)
    	{
    		if(Auth::user()):
    			$counts = DB::table('photos')
    		->where('user_id', Auth::user()->id)
    		->count();
    		else:
    			$counts ='';
    		endif;
    	}

    	public function Category(Request $request)
    	{
    		if(Auth::user()):
    			$counts = DB::table('photos')
    		->where('user_id', Auth::user()->id)
    		->count();
    		else:
    			$counts ='';
    		endif;
    	}
    }