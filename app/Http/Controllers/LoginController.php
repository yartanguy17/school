<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view('back-end.pages.connexion');
    }

    public function error () {
          return view('back-end.pages.AccessError');
    }

    public function login (Request $request) {
        $request->validate([
           'email'=>'required',
           'password'=>'required',
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)) {

           return redirect()->route('admin.dashboard');
        }else{
           return redirect('/')->with('error' , "email ou mot de passe incorrect");
        }
        }

        public function logout () {
         Auth::logout();
         return redirect('/');
        }
}
