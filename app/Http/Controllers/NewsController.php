<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\ValidationNews;
use App\Http\Requests\ValidationNewsEdit;

class NewsController extends Controller
{
   
    public function store( ValidationNews $request )
    {
        $News = new News();
        $News->name = $request->get('name');  
        $News->content = $request->get('content');
        $News->user_id = session()->get('id_user');
        
        new News();
        $News->save();
        return redirect()->route('index');
       
    }

    public function show( $id )
    {
        $news = News::where('user_id', '=',  session()->get('id_user') )->where('id', '=', $id)->first();

        if ( !$news ) 
        {
            return redirect()->route('index');
        }

        return view('editar', compact('news'));
    }

    public function update( ValidationNewsEdit $request, $id)
    {
        if ( !$news = News::find( $id ) ) 
        {
            return redirect()->back();
        }
 
        if( $request->get('nameAc') != $request->get('name') )
        {
            if ( News::where('name', $request->get('name') )->exists() ) 
            {
                return back()->withErrors([
                    'name' => 'The name not valid.',
                ])->onlyInput('name');
            }
            else
            {
                $data = $request->all();
                $news->update( $data );
            }
        }
        else
        {
            $data = $request->all();
            $news->update( $data );
        }

        return redirect()->route('index');
    }

    public function destroy( $id )
    {
        if ( !$News = News::find( $id ) ) 
        {
            return redirect()->back();
        }

        $News->delete();

        return redirect()->route('index');
    }

    public function search( Request $request )
    {
        $filters = $request->except('_token');

        $news = News::where('name', 'LIKE', "%{$request->search}%")->where('user_id', '=', session()->get('id_user') )->paginate();

        return view('index', compact('news', 'filters'));
    }
}
