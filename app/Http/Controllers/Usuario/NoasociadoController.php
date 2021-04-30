<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoasociadoController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return Response
   */
   public function index()
   {
       return view('usuario.noasociado');
   }

   /**
    * Show the application dashboard.
    *
    * @return Response
    */
    public function error()
    {
        return view('errors.404');
    }
}
