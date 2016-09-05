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
use App\Post;
use Auth;
use DB;
use File;

class ImgController extends Controller
{

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

			return Redirect::to('/');

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
			->join('categories as c', 'p.category_id', '=', 'c.id' )
			->join('users as u', 'p.user_id', '=', 'u.id')
			->select('p.title as photos_title', 'p.id', 'p.images', 'u.id as id', 'p.description',  'c.title as category_title' ,'u.name as name' )
			->where('p.title','like','%'.$search.'%')->paginate($perpage);
			;

			return view('home', [
				'counts' => $counts,
				'photos' => $photos,
				]);
			else:

				$photos = DB::table('photos as p')
			->join('categories as c', 'p.category_id', '=', 'c.id')
			->join('users as u', 'p.user_id', '=', 'u.id')
			->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title','u.name as name'  )->paginate($perpage);

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
			->join('users as u', 'p.user_id', '=', 'u.id')
			->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title',
				'u.name as name' )
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
			->join('users as u', 'p.user_id', '=', 'u.id')
			->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' , 'u.name as name' )
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
			$login = Auth::user()->id;
			else:
				$counts ='';
			$login = FALSE;
			endif;

			$photos = DB::table('photos')
			->where('id', $request->id)
			->get();

			$category = DB::table('categories')
			->get();

			$messages = DB::table('posts as p')
			->join('users as u', 'u.id', '=', 'p.user_id')
			->select('p.post', 'p.id', 'p.user_id', 'p.photo_id', 'u.id as user_id',  'u.name as username' )
			->where('p.photo_id', $request->id)->orderBy('id', 'DESC')->take(5)->get();

			return view('photos/images', [
				'counts' => $counts,
				'photos' => $photos,
				'category' => $category,
				'messages' => $messages,
				'login' => $login,
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

			$cat_id = DB::table('categories')
			->count();

			$rand = rand(1,$cat_id);

			$cat = DB::table('categories')
			->get();

			$photos = DB::table('photos')
			->take(4)->get();

			return view('photos/categories', [
				'counts' => $counts,
				'photos' => $photos,
				'cat' => $cat,
				'cat_id' => $cat_id,
				]);
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

			$perpage = 8 ; 

			$photos = DB::table('photos as p')
			->join('categories as c', 'p.category_id', '=', 'c.id')
			->select('p.title as photos_title', 'p.id', 'p.images', 'p.user_id', 'p.description',  'c.title as category_title' )
			->where('p.category_id', $request->id)->paginate($perpage);

			return view('photos/category', [
				'counts' => $counts,
				'photos' => $photos,
				]);
		}

		public function Messages(Request $request)
		{
			if(Auth::user()):
				$post = new Post;
			$post->post = $request->post;
			$post->user_id = Auth::user()->id;
			$post->photo_id = $request->photo;
			$post->save();

			Session::flash('Successfully', 'Messages successfully added'); 
			return Redirect::to('photo/'.$request->photo);
			else:
				Session::flash('Warning', 'You are not registered'); 
			return Redirect::to('photo/'.$request->photo);
			endif;
		}

		public function Edit(Request $request)
		{
			if(Auth::user()):
				$validator = Validator::make($request->all(), [
					'title' => 'required|max:255',
					'description' => 'required|max:255',
					'categories'  => 'required|max:255',
					]);
			if ($validator->fails()):
				return redirect('photo/'.$request->id)
			->withInput()
			->withErrors($validator);
			else:
				if ($request->file('image') != NULL):
					$destinationPath = 'uploads'; 
				$extension = $request->file('image')->getClientOriginalExtension(); 
				$fileName = md5(microtime() . rand(0, 9999)).'.'.$extension; 
				$files = $request->file('image')->move($destinationPath, $fileName); 

				DB::table('photos')
				->where('id', $request->id)
				->update([
					'title' => $request->title,
					'description' => $request->description, 
					'category_id' => $request->categories,
					'user_id' => Auth::user()->id, 
					'images' => $files
					]
					);


				Session::flash('Successfully', 'Updated successfully'); 
				return Redirect::to('photo/'.$request->id);

				else:
					DB::table('photos')
				->where('id', $request->edit)
				->update([
					'title' => $request->title,
					'description' => $request->description, 
					'category_id' => $request->categories,
					'user_id' => Auth::user()->id, 
					'images' => $request->images,
					]
					);
				Session::flash('Successfully', 'Updated successfully');
				return Redirect::to('photo/'.$request->id);
				endif;
				endif;
				endif;

			}
		}