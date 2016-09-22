<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Redirect;

class AdminController extends Controller
{
    public function Index(Request $request){
        if (Auth::user()):
            return view('admin/index' , [

                ]);
        else:
          return  redirect('/');
      endif;
  }
}
