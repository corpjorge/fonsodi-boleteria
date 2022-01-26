<?php

namespace App\Http\Controllers\Admin_boleteria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;
use App\Model\Boleteria\Serial;
use App\Model\Boleteria\Producto;
use App\Model\Boleteria\Asignacion;

use DB;
use Carbon\Carbon;

class AsignarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seriales = Serial::where('estado_actual_id', '!=', 1)->where('admin_user_id', '!=', '')->where('estado_actual_id', '!=', 5)->get();
        $productos = Producto::all();
        return view('admin_boleteria.asignacion.asignacion',
            ['seriales' => $seriales, 'productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $seriales = Serial::all()->where('admin_user_id', '=', '')->where('estado_actual_id', '!=', 1)->where('estado_actual_id', '!=', 5)->where('producto_id', $id);
        $producto = Producto::find($id);
        $admin_usuarios = AdminUser::all();
        return view('admin_boleteria.asignacion.add', compact('producto'), ['seriales' => $seriales, 'admin_usuarios' => $admin_usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $signacion = new Asignacion;
        $serial_update = new Serial;

        $seriales = $request->serial;

        $this->Validate($request, [
            'usuario' => 'required|',
            'venta' => 'required|numeric',
            'serial' => 'required|',
        ]);

        $fecha_created_at = Carbon::now();

        foreach ($seriales as $serials) {
            DB::table('asignaciones')->insert(
                [
                    'admin_user_id' => $request->usuario,
                    'serial_id' => $serials,
                    'estado_id' => 3,
                    'created_at' => $fecha_created_at,
                ]
            );
            DB::table('seriales')->where('id', $serials)->update(
                [
                    'admin_user_id' => $request->usuario,
                    'precio_venta' => $request->venta,
                    'estado_actual_id' => 3,
                    'updated_at' => $fecha_created_at,
                ]
            );
        }

        session()->flash('message', 'Guardado correctamente');
        return redirect('admin_boleteria/asignacion');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignacion = Asignaciones::find($id);
        return view('admin_boleteria.asignacion.add', ['asignacion' => $asignacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serial = Serial::find($id);
        $serial->admin_user_id = null;
        $serial->save();
        session()->flash('message', 'Serial revertido');
        return redirect('admin_boleteria/asignacion');
    }

    public function delete()
    {
        $array = array(
            '1654.',
            '1655.',
            '1656.',
            '1657.',
            '1658.',
            '1659.',
            '1660.',
            '1661.',
            '1662.',
            '1250.',
            '1251.',
            '1252.',
            '1253.',
            '10177.',
            '10176.',
            '10175.',
            '10193.',
            '10178.',
            '10195.',
            '10196.',
            '10194.',
            'Combo 3-CC 20804-399',
            'Combo 3-CC 20804-398',
            'Combo 3-CC 20804-397',
            'Combo 3-CC 20804-396',
            'Combo 3-CC 20804-395',
            'Combo 3-CC 20804-394',
            'Combo 3-CC 20804-393'
        );

        foreach ($array as &$valor) {
            $serial = Serial::where('numero', $valor)->first();
            if ($serial) {
                $asignacion = Asignacion::where('serial_id', $serial->id)->first();

                if ($asignacion) {
                    echo "'" . $asignacion->id . "'";
                    echo '<br>';
                } else {
                    if ($serial) {
                        echo "xxx => '" . $serial->id . "'";
                        echo '<br>';
                    }
                }
            } else {
                echo 'dddd '.$valor;
            }


        }

    }
}
