<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
  
    public function index()
    {
        if(Auth::check())
        {
            $news = News::all()->where('user_id', '=', session()->get('id_user') );
            return view('index')->with('news',$news);
        }
        else
          return view('login');
    }


}
