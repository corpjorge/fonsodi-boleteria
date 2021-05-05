<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use Auth;
 
/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{ 
        
    public function redirect()
    {
       return redirect()->route('login');       
    }    
    
    public function login()
    {       
       return view('welcome');       
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');              
    }
}
