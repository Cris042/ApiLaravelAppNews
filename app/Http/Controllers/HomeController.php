<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
  
    public function index()
    {
        if( session()->has('login') )
        {
            $news = News::all()->where('user_id', '=', session()->get('id_user') );
            return view('index')->with('news',$news);
        }
        else
          return view('login');
    }


}
