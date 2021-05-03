<?php

namespace App\Http\Controllers\Admin_boleteria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Boleteria\Proveedor;
use App\Model\Boleteria\Linea;
use DB;
use Carbon\Carbon;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores  = Proveedor::where('estados_id',1)->get();
        return view('admin_boleteria.proveedores.proveedores',[ 'proveedores' => $proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actualizar()
    {
      $fecha_created_at = Carbon::now();

      //servicios url
      $url_servicios = "http://190.145.4.62/WebServicesFonsodi/WSEstadoCuenta.asmx/PoblarListaDesplegable?pTabla=lineasservicios&pColumnas=cod_linea_servicio,nombre&pCondicion=&pOrden=nombre";
      $response_servicios = file_get_contents($url_servicios);
      $servicios = simplexml_load_string($response_servicios);

      //Líneas administradas por cartera
      $url_cartera = "http://190.145.4.62/WebServicesFonsodi/WSCredito.asmx/ListaDestinacionCredito?pCod_linea_Credito=8";
      $response_cartera = file_get_contents($url_cartera);
      $cartera_lineas = simplexml_load_string($response_cartera);

      $proveedores  = Proveedor::all();

      foreach ($servicios as $servicio) {
        $proveedores  = Proveedor::where('name',$servicio->descripcion)->first();
        if ($proveedores == null) {

          DB::table('proveedores')->insert(
              [
                'codigo' =>$servicio->idconsecutivo,
                'name' =>  $servicio->descripcion,
                'linea' => 1,
                'created_at' =>  $fecha_created_at,
              ]
          );
        }
      }

      foreach ($cartera_lineas as $cartera) {
        $proveedores  = Proveedor::where('name',$cartera->descripcion)->first();
        if ($proveedores == null) {
          DB::table('proveedores')->insert(
              [
                'codigo' => $cartera->cod_destino,
                'name' =>  $cartera->descripcion,
                'linea' =>  8,
                'created_at' =>  $fecha_created_at,
              ]
          );
        }
      }
      
      session()->flash('message', 'Listado actualizado');
      return redirect('admin_boleteria/proveedores/add');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $proveedores  = Proveedor::all();
      return view('admin_boleteria.proveedores.add', ['proveedores' => $proveedores]);
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->Validate($request,[
          'activar' => 'required',

      ]);

      for ($i=0; $i < count($request->activar); $i++) {
        DB::table('proveedores')
            ->where('id', $request->activar[$i])
            ->update(['estados_id' => 1]);
      }
      
      session()->flash('message', 'Listado actualizado');
      return redirect('admin_boleteria/proveedores');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $proveedor  = Proveedor::find($id);
      return view('admin_boleteria.proveedores.ver', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $proveedor  = Proveedor::find($id);
      $lineas  = Linea::all();
      return view('admin_boleteria.proveedores.update', compact('proveedor'), ['lineas' => $lineas] );
    }

    public function nit($id, $nit)
    {     
  
       $url_datos = "http://190.145.4.62/WebServicesFonsodi/WSEstadoCuenta.asmx/ConsultarDatoBasicosPersona?pEntidad=FONSODI&pIdentificador=".$nit."&pTipo=Identificacion";
        $response_xml_datos = file_get_contents($url_datos);
        $xml_datos = simplexml_load_string($response_xml_datos);    

        if ($xml_datos->result == 'false') {          
          return response()->json(["estado" => 'false']);
        } 
        else
        {        
          return response()->json($xml_datos);
        } 
 

    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->Validate($request,[
          'estados_id' => 'required|',
        ]);        

        $proveedor = Proveedor::find($id);
        $proveedor->nit = $request->nit;
        $proveedor->estados_id = $request->estados_id;
        $proveedor->save();
        
        session()->flash('message', 'Actualizado correctamente');
        return redirect('admin_boleteria/proveedores');
    }
}
