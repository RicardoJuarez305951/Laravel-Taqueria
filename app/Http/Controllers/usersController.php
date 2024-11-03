<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\Ordenes;
use App\Models\Platillos;
use App\Models\User;
use App\Models\Cliente;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function taquero(){
        $ordenes = Ordenes::all();
        $platillos = Platillos::all();
        $productos = Productos::all();
        $clientes = Cliente::all();
        $usuarios = User::all();
        
        return view('taquero', compact('productos','ordenes','platillos','usuarios','clientes'));
    }

    public function taqueroLibera(Request $request){
        $ordenTerminada = Ordenes::find($request->ordenesId);
        $ordenTerminada->listo = 1;
        $ordenTerminada->save();

        return redirect('/taquero');
    }

    
    
    public function pedido(){
        //return view('pedido');
        $productos = Productos::all();
        return view('pedido', compact('productos'));
    }

    public function taqueroAgregaImagen(Request $request){
    
        // $productoId = $request->productoId;
        $producto = Productos::find($request->productoId);

        $imagen = $request->file('imagen');

        $extension = $imagen->getClientOriginalExtension();
        $nombreImagen = $imagen->getClientOriginalName();       

        $imagen->storeAs('public',$nombreImagen .'.'. $extension);
        $producto->imagen = $nombreImagen .'.'. $extension;

        $producto->save();
        return redirect('/taquero');

    }
}
