<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\AdminUser;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $admin  = AdminUser::find(Auth::guard('admin_user')->user()->id);
      return view('admin.perfil');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
      $admin  = AdminUser::find($id);
      // return view('admin.verperfil',compact('admin'));
      // return view('admin.perfil',compact('admin'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function help()
    {
      return view('admin.help');
    }
}
