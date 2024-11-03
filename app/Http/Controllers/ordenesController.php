<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ordenes;
use App\Models\Platillos;
use App\Models\Productos;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    public function crearPedido(Request $request)
    {
        $productos = json_decode($request->input('productos'));

        // Crear la orden en la base de datos
        $orden = new Ordenes();
        $orden->clienteId = 1; // Reemplaza con el ID del cliente correspondiente
        $orden->mesa = $request->input('mesa');
        $orden->total = 0; // Se inicializa en 0 y se calculará más adelante
        $orden->listo = 0; // Se inicializa en 0 y se calculará más adelante
        
        // Guardar los platillos en la base de datos y calcular el total
        $orden->save();
        $total = 0;
        foreach ($productos as $producto) {
            $platillo = new Platillos();
            $platillo->ordenId = $orden->id;
            $platillo->productosId = $producto->productoId;
            $platillo->producto = $producto->nombre;
            $platillo->precio = $producto->precio * $producto->cantidad;
            $platillo->cantidad = $producto->cantidad;
            $platillo->save();

            $total += $platillo->precio;
        }

        // Actualizar el total de la orden
        $orden->total = $total;
        $orden->save();

        // Redireccionar a la página de éxito o mostrar un mensaje de confirmación
        return view('index');
    }

    
}
