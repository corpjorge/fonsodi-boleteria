<?php

namespace App\Exports;
 
use Maatwebsite\Excel\Concerns\FromArray;

class VentasExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        $ventasDetalles = \DB::select('
                SELECT ventas.created_at,  ventas.radicado, productos.nombre, seriales.numero, seriales.precio_venta, admin_users.email
                FROM `venta_detalles` detalle
                RIGHT OUTER JOIN ventas ON detalle.`venta_id` = ventas.id
                RIGHT OUTER JOIN seriales ON detalle.`serial_id` = seriales.id
                LEFT OUTER JOIN admin_users ON ventas.`admin_user_id` = admin_users.id
                LEFT OUTER JOIN productos ON seriales.producto_id = productos.id WHERE ventas.created_at > "2018-12-01 00:00:00";'
            );    
        
        foreach ($ventasDetalles as $ventasDetalle) {

           $result[] = $tabla = [
               'Fecha'    => $ventasDetalle->created_at,
               'Radicado' => $ventasDetalle->radicado,
               'Producto' => $ventasDetalle->nombre,
               'Serial'   => $ventasDetalle->numero,
               'Valor'    => $ventasDetalle->precio_venta,
               'Vendedor' => $ventasDetalle->email
            ];
        }
        
        return $result;
    }
}
