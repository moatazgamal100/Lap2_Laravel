<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $data=$request->validate([
            "email"=>'required|email|max:255',
            "password"=>'required|string|min:5|max:255',
        ]);
        $islogin=Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]);
        if(! $islogin){
            return back()->withErrors([
                'credentials not corect'
            ]);
        };
        return redirect(url('/categories'));

    }

    public function registerForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $data=$request->validate([
            "name"=>'required|string|max:255',
            "email"=>'required|email|unique:users,email|max:255',
            "password"=>'required|string|min:5|max:255|confirmed',
        ]);
        $data['password']=bcrypt($data['password']);
        $user=User::create($data);
        Auth::login($user);
        return redirect(url('/categories'));
    }

    public function logout() {
        Auth::logout();
        return redirect(url('/login'));
    }
}
