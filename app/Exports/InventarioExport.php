<?php

namespace App\Exports;
 
use Maatwebsite\Excel\Concerns\FromArray;
use App\Model\Boleteria\Serial;

class InventarioExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        $date = date('Y-m-d');
        $inventarios = Serial::where('estado_actual_id', '!=', '5')
            ->get();      
                        
        foreach ($inventarios as $inventario) {

            $tenencia[] = $tabla = [
                'Serial' => $inventario->numero,
                'Producto' => $inventario->serial_producto->nombre,
                'Fecha vencimiento' => $inventario->fecha_caducidad,
                'Responsable' => isset($inventario->serial_admin) ? $inventario->serial_admin->name : 'No Aplica'
            ];
        } 
        
        return $tenencia;
    }
}
