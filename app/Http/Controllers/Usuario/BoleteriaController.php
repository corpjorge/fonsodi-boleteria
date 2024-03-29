<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Boleteria\Venta;
use App\Model\Boleteria\Venta_detalle;
use App\Model\Usuario\Users_detalle;
use App\Model\Boleteria\Producto;
use App\Model\Boleteria\Serial;
use App\User;
use App\Model\Sistema\Correo_notication;
use App\Mail\Boleteria\Boleteria as Correoboleteria;
use App\AdminUser;

Use Auth;
use Mail;


class BoleteriaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $compras = Venta::orderBy('id','desc')->where('user_id',Auth::user()->id)->paginate(20);
      return view('usuario.boleteria.boleteria',[ 'compras' => $compras]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
        $venta = Venta::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $venta_detalles = Venta::find($id)->venta_detalle;
        $usuario = Users_detalle::where('user_id',$venta->user_id)->first();
        $telefonos = User::find($venta->user_id)->usuario_telefono->first();

        foreach ($venta_detalles as $venta_detalle) {
          $totales[] = $venta_detalle->producto->precio_venta;
          $totalpublicos[] = $venta_detalle->producto->precio_publico;
        }

        $total = array_sum($totales);
        $totalpublico = array_sum($totalpublicos);
        $ganancia = $totalpublico - $total;

        return view('usuario.boleteria.ver',compact('venta','usuario','telefonos','total','ganancia' ),[ 'venta_detalles' => $venta_detalles]);
  }

  public function imp($id)
  {
        $venta = Venta::where('id',$id)->where('user_id',Auth::user()->id)->first();
        $venta_detalles = Venta::find($id)->venta_detalle;
        $usuario = Users_detalle::where('user_id',$venta->user_id)->first();
        $telefonos = User::find($venta->user_id)->usuario_telefono->first();

        foreach ($venta_detalles as $venta_detalle) {
          $totales[] = $venta_detalle->producto->precio_venta;
          $totalpublicos[] = $venta_detalle->producto->precio_publico;
        }

        $total = array_sum($totales);
        $totalpublico = array_sum($totalpublicos);
        $ganancia = $totalpublico - $total;

        return view('usuario.boleteria.pdf',compact('venta','usuario','telefonos','total','ganancia' ),[ 'venta_detalles' => $venta_detalles]);
  }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $productos = Serial::boletasDisponibles();
       return view('usuario.boleteria.add', ['productos' => $productos]);
    }

    public function store(Request $request)
    {
        $this->Validate($request,['producto' => 'required|']);
        $usuario = User::detalle();
        $productos = $request->producto;
        foreach ($productos as $producto) {
          $productosname[] = $producto;          
        }
        $productoCANT = $request->productoCANT;
        foreach ($productoCANT as $productoCAN) {
          $cantidad[] = $productoCAN;
        }
         
          //$correo = AdminUser::where('ciudad','LIKE','%'.$usuario->cuidad.'%')->first();
          
        $correo = "administrativa@fonsodi.com";
        //$correo = "corpjorge@hotmail.com";
        /*  Mail::to($correo, 'atencionasociados@fonsodi.com',$productosname,
                 $usuario->cedula,$usuario->usuario->name,$usuario->usuario->email) 
          ->send(new Correoboleteria($correo, $productosname,$usuario));
          */
          Mail::send(new Correoboleteria($correo, $productosname,$usuario,$cantidad));

        session()->flash('message', 'Se le ha informado a el Comercial más cercano a su tienda para que pueda informarle sobre los productos que desea adquirir');
        return redirect('boleteria/productos/add');

    }


}
