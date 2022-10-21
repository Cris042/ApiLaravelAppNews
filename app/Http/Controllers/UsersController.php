<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ValidationUser;

class UsersController extends Controller
{
    public function storeView()
    {
        return view('regriste');
    }

    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $email = $request->get('email');  
    
        $user = User::where('email', '=', $email )->first();

        if (Auth::attempt($credentials)) 
        {
           
            session(['login' => true]);
            session(['id_user' => $user["id"]]);
 
            return redirect()->route('index');

        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
      

     
 
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('index');
    }

    public function store( ValidationUser $request )
    {
        $users = new User();
        $users->name = $request->get('name');  
        $users->email = $request->get('email');
        $users->password = Hash::make( $request->get('password') ); 
        $users->save();
        return redirect()->route('index');
       
    }

   
}
