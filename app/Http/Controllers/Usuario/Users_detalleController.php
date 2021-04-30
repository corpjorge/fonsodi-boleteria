<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Usuario\Users_detalle;
use App\Model\Usuario\TrasnSolidaria;
use Auth;

class Users_detalleController extends Controller
{
      /**
       * Show the application dashboard.
       *
       * @return Response
       */
       public function index()
       {
           $users_detalles  = Users_detalle::all()->where('user_id', Auth::user()->id);
           return view('usuario.perfil',[ 'users_detalles' => $users_detalles]);

       }

       /**
        * Show the application dashboard.
        *
        * @return Response
        */
        public function datos($id)
        {
            $users_detalles = Users_detalle::where('id',$id)->first();
            return view('usuario.datos',[ 'users_detalles' => $users_detalles]);

        }

        /**
         * Show the application dashboard.
         *
         * @return Response
         */
         public function datosUsuario($id)
         {
             $users_detalles = Users_detalle::where('user_id',$id)->first();

             return view('usuario.datos', compact('users_detalles'));
         }

        public function help()
        {
          return view('usuario.help.help');
        }

        public function transferencia()
        {
           $users_detalles  = Users_detalle::where('user_id', Auth::user()->id)->first();
           $trasnSolidaria  = TrasnSolidaria::where('cedula',$users_detalles->cedula)->first();
           $url_doc = "http://fonsodi.com/images/oficina_virtual/2017/".$trasnSolidaria->archivo;
           return view('usuario.transferencia',compact('url_doc'));

        }
}
